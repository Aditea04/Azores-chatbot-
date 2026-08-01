<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// ─── 1. LOAD TRUTHS, MISCONCEPTIONS & KNOWLEDGE PRINCIPLES ───────────────────
$sysPromptFile  = __DIR__ . '/instructions/SYSTEM_PROMPT.txt';
$wfInstFile     = __DIR__ . '/instructions/API_WORKFLOW_INSTRUCTIONS.md';
$intentGuideFile= __DIR__ . '/instructions/INTENT_DECIPHERING_GUIDE.md';

$systemPrompt   = file_exists($sysPromptFile) ? file_get_contents($sysPromptFile) : '';
$workflowInst   = file_exists($wfInstFile) ? file_get_contents($wfInstFile) : '';
$intentGuide    = file_exists($intentGuideFile) ? file_get_contents($intentGuideFile) : '';

$truthsFile    = __DIR__ . '/data/business_truths.json';
$miscFile      = __DIR__ . '/data/misconceptions.json';
$doNotSayFile = file_exists('F:/chatbot/do_not_say.txt') ? 'F:/chatbot/do_not_say.txt' : __DIR__ . '/data/do_not_say.txt';
$knowledgeFile = file_exists('F:/chatbot/knowledge.txt') ? 'F:/chatbot/knowledge.txt' : __DIR__ . '/data/knowledge.txt';

$truthsData    = file_exists($truthsFile) ? json_decode(file_get_contents($truthsFile), true) : [];
$miscData      = file_exists($miscFile)   ? json_decode(file_get_contents($miscFile), true)   : [];
$doNotSayRules = file_exists($doNotSayFile) ? file_get_contents($doNotSayFile) : '';
$knowledgeRules= file_exists($knowledgeFile) ? file_get_contents($knowledgeFile) : '';

$questionsData = [];

// 1. Load questions_dataset.json
$datasetFile = __DIR__ . '/data/questions_dataset.json';
if (file_exists($datasetFile)) {
    $decoded = json_decode(file_get_contents($datasetFile), true);
    if (is_array($decoded)) {
        $questionsData = array_merge($questionsData, $decoded);
    }
}

// 2. Load azores_850_qa_dataset.json
$dataset850File = __DIR__ . '/data/azores_850_qa_dataset.json';
if (file_exists($dataset850File)) {
    $decoded850 = json_decode(file_get_contents($dataset850File), true);
    if (is_array($decoded850) && isset($decoded850['questions_and_answers']) && is_array($decoded850['questions_and_answers'])) {
        foreach ($decoded850['questions_and_answers'] as $qaItem) {
            $questionsData[] = [
                'question'    => isset($qaItem['question']) ? $qaItem['question'] : '',
                'response'    => isset($qaItem['answer']) ? $qaItem['answer'] : (isset($qaItem['response']) ? $qaItem['response'] : ''),
                'suggestions' => ["Our Services", "Highway Projects", "Contact Team"]
            ];
        }
    }
}

// ─── 2. READ API KEY ──────────────────────────────────────────────────────────
$apiKey = getenv('CLAUDE_API_KEY');
if (!$apiKey && file_exists(__DIR__ . '/config.env')) {
    foreach (file(__DIR__ . '/config.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (strpos(trim($line), 'CLAUDE_API_KEY=') === 0) {
            $val = trim(substr(trim($line), strlen('CLAUDE_API_KEY=')));
            if ($val) { $apiKey = $val; }
            break;
        }
    }
}

// ─── 3. PARSE REQUEST ─────────────────────────────────────────────────────────
$rawInput    = file_get_contents('php://input');
$data        = json_decode($rawInput, true);
if (!$data && !empty($_POST)) {
    $data = $_POST;
}
$userMessage = isset($data['message']) ? trim($data['message']) : '';
$history     = isset($data['history']) && is_array($data['history']) ? $data['history'] : [];

if (empty($userMessage)) {
    echo json_encode(['status' => 'error', 'reply' => 'Please enter a valid message.', 'suggestions' => []]);
    exit;
}

// ─── 4. BUILD SYSTEM INSTRUCTION WITH EMBEDDED KNOWLEDGE BASE & CONSTRAINTS ──
$truthsJsonStr = json_encode($truthsData, JSON_PRETTY_PRINT);
$miscJsonStr   = json_encode($miscData, JSON_PRETTY_PRINT);

$systemInstruction = "You are Azores AI, the official Virtual Assistant for Azores Infrastructure Private Limited (AIPL).

STRICT NEGATIVE RESTRICTIONS (DO NOT SAY):
{$doNotSayRules}

CORE KNOWLEDGE PRINCIPLES:
{$knowledgeRules}

STRICT SCOPE & RESPONSE RULES:
1. DIRECT SERVICE INQUIRIES ('what services do you have?', 'our services', 'specializations'):
   Start reply with: 'Here are the services we provide:' followed by service details or specialization links.
2. IRRELEVANT / OFF-TOPIC QUESTIONS (homework, recipes, coding, games, sports, weather, personal tasks, etc.):
   Start reply with: '🤣 Lol! I cant help you with that...<br><br>But here\'s how i can definitely help you:' followed by Azores service specializations.
3. Keep replies concise, professional, and confident. Use GFM HTML tags (like <strong>, <ul>, <li>) when formatting lists or contact details.
4. After your reply, on a NEW LINE write: CHIPS: followed by 2-3 relevant follow-up suggestions separated by '|'.
   Example: CHIPS: Highway Projects|Turnkey EPC|Contact Details

COMPANY KNOWLEDGE & TRUTHS (JSON):
{$truthsJsonStr}

COMMON MISCONCEPTIONS & FACTS (JSON):
{$miscJsonStr}";

// ─── 5. SMART INTENT MATCHING (FAST LOCAL INTERCEPTOR) ────────────────────────
function buildCapsulesHTML() {
    return "<div class=\"az-capsules-list\" style=\"margin: 10px 0; display: flex; flex-direction: column; gap: 8px;\">" .
        "<a href=\"specialization-highways.php\" class=\"az-capsule-btn\" title=\"Visit Highways & Expressways Page\"><span class=\"az-capsule-title\">Highways & Expressways</span><span class=\"az-capsule-hover-url\">🔗 specialization-highways.php</span></a>" .
        "<a href=\"specialization-bridges.php\" class=\"az-capsule-btn\" title=\"Visit Bridges & Elevated Structures Page\"><span class=\"az-capsule-title\">Bridges & Elevated Structures</span><span class=\"az-capsule-hover-url\">🔗 specialization-bridges.php</span></a>" .
        "<a href=\"specialization-turnkey.php\" class=\"az-capsule-btn\" title=\"Visit Turnkey EPC & PEB Sheds Page\"><span class=\"az-capsule-title\">Turnkey EPC & PEB Sheds</span><span class=\"az-capsule-hover-url\">🔗 specialization-turnkey.php</span></a>" .
        "<a href=\"specialization-institutional.php\" class=\"az-capsule-btn\" title=\"Visit Institutional Infrastructure Page\"><span class=\"az-capsule-title\">Institutional & Hospital Infrastructure</span><span class=\"az-capsule-hover-url\">🔗 specialization-institutional.php</span></a>" .
        "<a href=\"specialization-residential.php\" class=\"az-capsule-btn\" title=\"Visit Residential Townships Page\"><span class=\"az-capsule-title\">Residential Townships</span><span class=\"az-capsule-hover-url\">🔗 specialization-residential.php</span></a>" .
        "</div>";
}

function buildHyperlinksHTML() {
    return "<div style=\"margin: 8px 0; display: flex; flex-direction: column; gap: 6px;\">" .
        "<a href=\"specialization-highways.php\" style=\"color:#1d4ed8; text-decoration:underline; font-weight:bold;\">Highways & Expressways 🔗 specialization-highways.php</a>" .
        "<a href=\"specialization-bridges.php\" style=\"color:#1d4ed8; text-decoration:underline; font-weight:bold;\">Bridges & Elevated Structures 🔗 specialization-bridges.php</a>" .
        "<a href=\"specialization-turnkey.php\" style=\"color:#1d4ed8; text-decoration:underline; font-weight:bold;\">Turnkey EPC & PEB Sheds 🔗 specialization-turnkey.php</a>" .
        "<a href=\"specialization-institutional.php\" style=\"color:#1d4ed8; text-decoration:underline; font-weight:bold;\">Institutional & Hospital Infrastructure 🔗 specialization-institutional.php</a>" .
        "<a href=\"specialization-residential.php\" style=\"color:#1d4ed8; text-decoration:underline; font-weight:bold;\">Residential Townships 🔗 specialization-residential.php</a>" .
        "</div>";
}

function buildServicesHTML() {
    $contactInfoHTML = "📞 <strong>+91 7004709933</strong> | 📧 <strong>Azores.ranchi@gmail.com</strong>";
    return "Here are the services we provide:<br>" . 
           buildCapsulesHTML() . 
           "<br>For more details reach out to us at " . $contactInfoHTML . " or check out our <a href=\"index.php\" style=\"color:#1d4ed8; text-decoration:underline; font-weight:bold;\">website</a>.";
}

function buildCompanyOverviewHTML() {
    $contactInfoHTML = "📞 <strong>+91 7004709933</strong> | 📧 <strong>Azores.ranchi@gmail.com</strong>";
    return "<strong>Azores Infrastructure Private Limited (AIPL)</strong> is a Class 1A Government Registered Civil Engineering Contractor with over 29+ years of industry experience and 120+ executed infrastructure projects across India.<br><br>" . 
           "Here are the services we provide:<br><br>" . 
           buildHyperlinksHTML() . 
           "<br>For more details reach out to us at " . $contactInfoHTML . " or check out our <a href=\"index.php\" style=\"color:#1d4ed8; text-decoration:underline; font-weight:bold;\">website</a>.";
}

function buildIrrelevantResponseHTML() {
    $contactInfoHTML = "📞 <strong>+91 7004709933</strong> | 📧 <strong>Azores.ranchi@gmail.com</strong>";
    return "🤣 Lol! I cant help you with that...<br><br>But here's how i can definitely help you:<br>" . 
           buildCapsulesHTML() . 
           "<br>For more details reach out to us at " . $contactInfoHTML . " or check out our <a href=\"index.php\" style=\"color:#1d4ed8; text-decoration:underline; font-weight:bold;\">website</a>.";
}

function matchLocalIntent($userMessage, $questionsData = []) {
    $rawMsg = trim($userMessage);
    $msg = strtolower(preg_replace('/[^\w\s]/u', '', $rawMsg));

    if (empty($msg)) return null;

    // Strip conversational filler prefixes (e.g. "okay then ", "so ", "well ", "then ")
    $cleanMsg = preg_replace('/^(okay\s+then|ok\s+then|so\s+then|well\s+then|okay|ok|so|well|then|alright)\s+/i', '', $msg);

    // 1. GREETINGS (HI, HELLO, HEY, ETC.)
    if (preg_match('/^(hi|hello|hey|greetings|good morning|good afternoon|good evening|namaste|yo|sup|hi there|hello there|hey there|who are you|what is this)[!.,\s]*$/i', $msg) || $msg === 'hi' || $msg === 'hello' || $msg === 'hey') {
        return [
            'reply' => "Hey! Nice to meet you. I am Azores AI, how can I help you today?",
            'suggestions' => ["Our Services", "Class 1A Credentials", "Contact Us"]
        ];
    }

    // 1B. NAME INTRODUCTIONS & POLITE GREETINGS ("nice to meet you too, I'm Adity", "I'm Adity", "nice to meet you too")
    if (preg_match('/\b(im|i am|i\'m|my name is|this is|call me)\s+([a-z]+)\b/i', trim($rawMsg), $nameMatches) || preg_match('/\b(im|i am|my name is|this is|call me)\s+([a-z]+)\b/i', $msg, $nameMatches)) {
        $userName = ucfirst(trim($nameMatches[2]));
        return [
            'reply' => "Nice to meet you, {$userName}! How can I help you today?",
            'suggestions' => ["Our Services", "Class 1A Credentials", "Contact Us"]
        ];
    }
    if (preg_match('/\b(nice to meet you|pleasure to meet you|good to meet you|glad to meet you|nice meeting you)\b/i', $msg)) {
        return [
            'reply' => "Nice to meet you too! How can I help you with your project today?",
            'suggestions' => ["Our Services", "Class 1A Credentials", "Contact Us"]
        ];
    }

    // 2. FAREWELLS / GOODBYES (BYE, GOODBYE, ETC.)
    if (preg_match('/^(bye|goodbye|bye bye|see ya|see you|have a good day|cya|talk to you later|catch you later|thank you bye|thanks bye|exit|quit|take care)[!.,\s]*$/i', $msg) || strpos($msg, 'bye') !== false || strpos($msg, 'goodbye') !== false || strpos($msg, 'see you') !== false) {
        return [
            'reply' => "Thank you so much for stopping by, it was great speaking to you. Have a good day!",
            'suggestions' => ["Our Services", "Contact Team", "Visit Website"]
        ];
    }

    // 3. IRRELEVANT / OFF-TOPIC CONSUMER QUESTIONS (MUST BE EVALUATED BEFORE GENERAL HELP MATCHER)
    if (preg_match('/\b(recipe|recipes|cook|cooking|bake|soup|chicken soup|food|weather|rain|movie|game|coding|python|java|php|math|mathematics|solve|joke|song|cricket|football|actor|homework|study|school work|assignment|tea|chai|coffee|flat|flats|rent|renting|rental|lease|room|rooms|noida|gurgaon|delhi flat|plumber|electrician|doctor|medicine)\b/i', $msg)) {
        return [
            'reply' => buildIrrelevantResponseHTML(),
            'suggestions' => ["Highway Projects", "Bridge Projects", "Contact Team"]
        ];
    }

    // 4. GENERAL DIRECT PROJECT ASK / HELP ASK (FLOWCHART: "To help you with any such information, first of all I have to know what is your project about")
    if ((preg_match('/\b(i need your help|need your help|i need help|need help|help me|can you help|can u help|do my project|do a project|do this project|execute my project|execute a project|build my project|build a project|make a project|have a project|start a project|handle my project|take my project|construction help|project help|need help with|want to make a project|help me with|help with a project|help me build|can you do|can u do)\b/i', $msg) || (strpos($msg, 'project') !== false && (strpos($msg, 'do') !== false || strpos($msg, 'help') !== false || strpos($msg, 'build') !== false || strpos($msg, 'make') !== false))) && !preg_match('/\b(highway|bridge|flyover|peb|shed|turnkey|epc|school|hospital|township|residential|budget|cost|price|rate|discount|manpower|timeline|material)\b/i', $msg)) {
        return [
            'reply' => "To help you with any such information, first of all I have to know what is your project about",
            'suggestions' => ["Highways & Roads", "Bridges & Flyovers", "Turnkey EPC", "Institutional Infrastructure", "Residential Townships"]
        ];
    }

    // SPECIALIZATION INQUIRIES (EXACT SPECIFIED RESPONSES)
    if (preg_match('/\b(turnkey|peb|peb shed|epc)\b/i', $msg) && !preg_match('/\b(budget|cost|price|rate|discount|manpower|timeline|material|people|staff)\b/i', $msg)) {
        return [
            'reply' => "Yes, absolutely! We handle complete Turnkey EPC projects — managing everything from engineering design, procurement, and civil construction to final testing and handover under a single contract.<br><br>" .
                       "You can explore our <a href=\"specialization-turnkey.php\" style=\"color:#1d4ed8; text-decoration:underline; font-weight:bold;\">Turnkey & EPC Project capabilities here</a>.<br><br>" .
                       "Since major EPC contracts require detailed technical discussions, please connect with our engineering team directly over 📞 <strong>+91 7004709933</strong> | 📧 <strong>Azores.ranchi@gmail.com</strong>",
            'suggestions' => ["Turnkey Capabilities", "PEB Sheds", "Contact Team"]
        ];
    }
    if (preg_match('/\b(bridge|bridges|flyover|flyovers|rob|robs|rub|rubs)\b/i', $msg) && !preg_match('/\b(budget|cost|price|rate|discount|manpower|timeline|material|people|staff)\b/i', $msg)) {
        return [
            'reply' => "You're in the right place! We specialize in multi-span pre-stressed concrete (PSC) girder bridges, Railway Overbridges (ROBs), RUBs, and urban flyovers.<br><br>" .
                       "You can check our <a href=\"specialization-bridges.php\" style=\"color:#1d4ed8; text-decoration:underline; font-weight:bold;\">Bridge & Elevated Structure projects here</a>.<br><br>" .
                       "To discuss your bridge specifications or tender details, please get in touch with us over 📞 <strong>+91 7004709933</strong> | 📧 <strong>Azores.ranchi@gmail.com</strong>",
            'suggestions' => ["Bridge Projects", "Railway Overbridges", "Contact Team"]
        ];
    }
    if (preg_match('/\b(highway|highways|expressway|expressways|road|roads)\b/i', $msg) && !preg_match('/\b(budget|cost|price|rate|discount|manpower|timeline|material|people|staff)\b/i', $msg)) {
        return [
            'reply' => "You're in the right place! We specialize in flexible asphalt pavements, rigid concrete roads (PQC), highway widening, embankment construction, and toll plaza infrastructure.<br><br>" .
                       "You can check our <a href=\"specialization-highways.php\" style=\"color:#1d4ed8; text-decoration:underline; font-weight:bold;\">Highways & Expressways projects here</a>.<br><br>" .
                       "To discuss your highway specifications or tender details, please get in touch with us over 📞 <strong>+91 7004709933</strong> | 📧 <strong>Azores.ranchi@gmail.com</strong>",
            'suggestions' => ["Highway Projects", "Concrete PQC Roads", "Contact Team"]
        ];
    }
    if (preg_match('/\b(institutional|hospital|hospitals|college|school|university|academic)\b/i', $msg) && !preg_match('/\b(budget|cost|price|rate|discount|manpower|timeline|material|people|staff)\b/i', $msg)) {
        return [
            'reply' => "You're in the right place! We construct purpose-built institutional infrastructure, including schools, university campuses, multispecialty hospitals, high court annexes, and administrative complexes.<br><br>" .
                       "You can view our <a href=\"specialization-institutional.php\" style=\"color:#1d4ed8; text-decoration:underline; font-weight:bold;\">Institutional Infrastructure projects here</a>.<br><br>" .
                       "Please reach out to our team at 📞 <strong>+91 7004709933</strong> | 📧 <strong>Azores.ranchi@gmail.com</strong> to discuss your project requirements.",
            'suggestions' => ["Institutional Projects", "Hospitals", "Contact Team"]
        ];
    }
    if (preg_match('/\b(residential|township|townships|housing|apartments|towers)\b/i', $msg) && !preg_match('/\b(budget|cost|price|rate|discount|manpower|timeline|material|people|staff)\b/i', $msg)) {
        return [
            'reply' => "You're in the right place! We build integrated residential townships, high-rise residential towers, gated community infrastructure, utilities, and land development.<br><br>" .
                       "You can view our <a href=\"specialization-residential.php\" style=\"color:#1d4ed8; text-decoration:underline; font-weight:bold;\">Residential Townships projects here</a>.<br><br>" .
                       "To discuss your residential township specifications, please get in touch with us over 📞 <strong>+91 7004709933</strong> | 📧 <strong>Azores.ranchi@gmail.com</strong>",
            'suggestions' => ["Residential Projects", "High-Rise Towers", "Contact Team"]
        ];
    }

    // 3. IN-DEPTH COMMERCIAL / BUDGET / FINANCIAL / EXPENSES / STAFF INQUIRIES
    if (preg_match('/\b(budget|cost|costs|price|prices|pricing|rate|rates|discount|discounts|expense|expenses|expenditure|finance|finances|financial|estimate|estimation|quotation|timeline|duration|manpower|labor|labour|workforce|material|materials|steel|cement|concrete|land|land cost|acre|sqft|sq ft|sqm|sq m|fee|fees|charge|charges|tender quote|boq|bill of quantities|people|team|staff|engineer|engineers|managing director|director|owner|founder|ceo)\b/i', $msg)) {
        $contactInfoHTML = "📞 <strong>+91 7004709933</strong> | 📧 <strong>Azores.ranchi@gmail.com</strong>";
        return [
            'reply' => "I cannot help you with that currently but you can reach out to us at " . $contactInfoHTML . " and enquire about it.",
            'suggestions' => ["Call +91 7004709933", "Send Email", "Contact Team"]
        ];
    }

    // 4. GENERAL COMPANY & BUSINESS OVERVIEW INQUIRIES ("tell me about your business", "about your company", "what does azores do?")
    if (preg_match('/\b(business|company|firm|contractor|what do you do|what do u do|what does azores do|what do you guys do|what work do you do|what is azores|who is azores|company overview|business overview|company profile|business profile)\b/i', $msg) || 
        preg_match('/\b(about\s+(your\s+)?(business|company|azores|aipl|firm))\b/i', $msg) || 
        preg_match('/\b(about\s+(your\s+)?(business|company|azores|aipl|firm))\b/i', $cleanMsg)) {
        return [
            'reply' => buildCompanyOverviewHTML(),
            'suggestions' => ["Highway Projects", "Bridge Projects", "Contact Team"]
        ];
    }

    // 5. DIRECT SERVICE INQUIRIES ("what services do you have", "our services", "specializations")
    if (preg_match('/\b(service|services|specialization|specializations|offer|our work|our projects|our solutions|capabilities)\b/i', $msg)) {
        return [
            'reply' => buildServicesHTML(),
            'suggestions' => ["Highway Projects", "Bridge Projects", "Contact Team"]
        ];
    }

    // 5. IRRELEVANT / OFF-TOPIC CONSUMER QUESTIONS
    if (preg_match('/\b(recipe|cook|food|weather|rain|movie|game|coding|python|java|php|math|solve|joke|song|cricket|football|actor|homework|study|school work|assignment|tea|chai|coffee|bake|dance|soup)\b/i', $msg)) {
        return [
            'reply' => buildIrrelevantResponseHTML(),
            'suggestions' => ["Highway Projects", "Bridge Projects", "Contact Team"]
        ];
    }

    // 6. CHECK MASTER 4,500+ Q&A DATASET WITH VECTOR SIMILARITY SEARCH
    if (!empty($questionsData) && is_array($questionsData)) {
        $bestMatch = null;
        $highestScore = 0;

        foreach ($questionsData as $item) {
            $qRaw = isset($item['question']) ? $item['question'] : (isset($item['query']) ? $item['query'] : '');
            $r    = isset($item['response']) ? $item['response'] : (isset($item['reply']) ? $item['reply'] : (isset($item['answer']) ? $item['answer'] : ''));
            $s    = isset($item['suggestions']) && is_array($item['suggestions']) ? $item['suggestions'] : ["Our Services", "Contact Us", "Highway Projects"];
            
            if (empty($qRaw) || empty($r)) continue;

            $qNorm = strtolower(preg_replace('/[^\w\s]/u', '', $qRaw));

            // Skip dataset entry if it's a short greeting
            if (in_array($qNorm, ['hi', 'hello', 'hey', 'bye', 'goodbye'])) continue;

            // Exact match or Substring match
            if ($msg === $qNorm || (strlen($qNorm) > 4 && (strpos($msg, $qNorm) !== false || strpos($qNorm, $msg) !== false))) {
                return ['reply' => $r, 'suggestions' => $s];
            }

            // Jaccard & N-Gram Similarity calculation
            $words1 = array_filter(explode(' ', $msg));
            $words2 = array_filter(explode(' ', $qNorm));
            $intersect = count(array_intersect($words1, $words2));
            $union = count(array_unique(array_merge($words1, $words2)));
            $score = $union > 0 ? ($intersect / $union) : 0;

            if ($score > $highestScore && $score >= 0.50) {
                $highestScore = $score;
                $bestMatch = ['reply' => $r, 'suggestions' => $s];
            }
        }

        if ($bestMatch) {
            return $bestMatch;
        }
    }

    if (preg_match('/\b(contact|phone|call|number|reach|email|mail|address)\b/i', $msg) && !preg_match('/\b(build|bridge|highway|project)\b/i', $msg)) {
        return [
            'reply' => "Reach Azores Infrastructure Private Limited directly:<br><br>📞 <strong>+91 7004709933</strong><br>📧 <strong>Azores.ranchi@gmail.com</strong><br>🏢 <strong>Corporate Office: Ranchi, Jharkhand, India</strong>",
            'suggestions' => ["Call +91 7004709933", "Send Email", "Partner With Us"]
        ];
    }
    if (preg_match('/\b(office|headquarter|location|ranchi|delhi|jharkhand)\b/i', $msg) && !preg_match('/\b(build|bridge|highway)\b/i', $msg)) {
        return [
            'reply' => "📍 <strong>Corporate Office & Machinery Yard:</strong> Ranchi, Jharkhand, India.<br>🏢 <strong>Bidding & Corporate Finance Hub:</strong> New Delhi.<br><br>Operating corporate finance hubs in New Delhi while maintaining physical machinery yards in regional corridors like Jharkhand is standard practice for national contractors.",
            'suggestions' => ["Machinery Fleet", "Contact Us", "Our Services"]
        ];
    }
    return null;
}

$localIntercept = matchLocalIntent($userMessage, $questionsData);
if ($localIntercept) {
    echo json_encode([
        'status'      => 'success',
        'reply'       => $localIntercept['reply'],
        'suggestions' => $localIntercept['suggestions'],
        'engine'      => 'smart-intent-interceptor'
    ]);
    exit;
}

// ─── 6. ANTHROPIC CLAUDE API CALL (MESSAGES ENDPOINT) ───────────────────────
function callClaude($apiKey, $systemInstruction, $history, $userMessage) {
    $url = "https://api.anthropic.com/v1/messages";

    $messages = [];
    foreach ($history as $msg) {
        $role = (isset($msg['role']) && strtolower($msg['role']) === 'user') ? 'user' : 'assistant';
        $text = isset($msg['content']) ? $msg['content'] : (isset($msg['text']) ? $msg['text'] : '');
        if ($text) {
            $messages[] = ['role' => $role, 'content' => $text];
        }
    }
    
    $last = end($messages);
    if (empty($messages) || ($last && $last['role'] !== 'user')) {
        $messages[] = ['role' => 'user', 'content' => $userMessage];
    } else {
        $messages[count($messages) - 1]['content'] = $userMessage;
    }

    $payload = json_encode([
        'model'       => 'claude-opus-4-6',
        'max_tokens'  => 1024,
        'system'      => $systemInstruction,
        'messages'    => $messages,
        'thinking'    => ['type' => 'adaptive']
    ]);

    $ctx = stream_context_create([
        'http' => [
            'method'        => 'POST',
            'header'        => "Content-Type: application/json\r\n" .
                               "x-api-key: {$apiKey}\r\n" .
                               "anthropic-version: 2023-06-01\r\n" .
                               "Content-Length: " . strlen($payload) . "\r\n",
            'content'       => $payload,
            'timeout'       => 30,
            'ignore_errors' => true
        ],
        'ssl' => [
            'verify_peer'      => false,
            'verify_peer_name' => false
        ]
    ]);

    $response = @file_get_contents($url, false, $ctx);
    if ($response === false) {
        return ['error' => true, 'raw' => null];
    }

    $json = json_decode($response, true);
    $text = '';
    if (isset($json['content']) && is_array($json['content'])) {
        foreach ($json['content'] as $block) {
            if (isset($block['type']) && $block['type'] === 'text') {
                $text .= $block['text'];
            }
        }
    }

    return ['error' => false, 'text' => $text, 'raw_json' => $json];
}

// Call Claude API if available
if ($apiKey) {
    $res = callClaude($apiKey, $systemInstruction, $history, $userMessage);
    if (is_array($res) && !$res['error'] && !empty($res['text'])) {
        $raw = $res['text'];
        $chips = [];
        $reply = $raw;
        if (preg_match('/\nCHIPS:\s*(.+)$/si', $raw, $m)) {
            $reply = trim(preg_replace('/\nCHIPS:\s*.+$/si', '', $raw));
            $chips = array_filter(array_map('trim', explode('|', $m[1])));
            $chips = array_values(array_slice($chips, 0, 3));
        }
        echo json_encode(['status' => 'success', 'reply' => $reply, 'suggestions' => $chips, 'engine' => 'claude-opus-4-6']);
        exit;
    }
}

// ─── 7. 100% FREE INTELLIGENT KNOWLEDGE BASE ENGINE (HUMANIZED & DIRECT) ──────
$msg = strtolower(trim($userMessage));
$reply = '';
$chips = [];

function containsAny($input, $keywords) {
    foreach ($keywords as $kw) {
        if (strpos($input, strtolower($kw)) !== false) return true;
    }
    return false;
}

$contactInfoHTML = "📞 <strong>+91 7004709933</strong> | 📧 <strong>Azores.ranchi@gmail.com</strong>";
$unmatchedResponse = buildIrrelevantResponseHTML();



// 1. OUT-OF-SCOPE / UNSUPPORTED INDIVIDUAL CONSUMER SERVICES
if (containsAny($msg, ['flat for rent', 'apartment for rent', 'rent flat', 'lease room', 'single room', 'recipe', 'food', 'weather', 'movie', 'game', 'coding', 'python', 'java', 'php', 'math', 'homework', 'assignment', 'study', 'joke', 'cricket', 'football', 'repair roof', 'plumber', 'electrician', 'tea', 'chai', 'coffee', 'cook', 'bake', 'dance'])) {
    $reply = $unmatchedResponse;
    $chips = ["Highway Projects", "Bridge Projects", "Contact Team"];
}

// 2. TURNKEY & EPC CONTRACTS
elseif (containsAny($msg, ['turnkey', 'epc', 'single point', 'design-build', 'lump sum'])) {
    $reply = "Yes, absolutely! We handle complete <strong>Turnkey EPC projects</strong> — managing everything from engineering design, procurement, and civil construction to final testing and handover under a single contract.<br><br>" .
             "You can explore our <a href=\"specialization-turnkey.php\" style=\"text-decoration:underline; font-weight:bold; color:#1d4ed8;\">Turnkey & EPC Project capabilities here</a>.<br><br>" .
             "Since major EPC contracts require detailed technical discussions, please connect with our engineering team directly over " . $contactInfoHTML;
    $chips = ["PEB Sheds", "Contact Team", "View Services"];
}

// 3. BRIDGES, ROBS, RUBS & FLYOVERS
elseif (containsAny($msg, ['bridge', 'girder', 'flyover', 'rob', 'rub', 'overbridge', 'underbridge', 'viaduct', 'causeway', 'culvert', 'pier'])) {
    $reply = "You're in the right place! We specialize in multi-span pre-stressed concrete (PSC) girder bridges, Railway Overbridges (ROBs), RUBs, and urban flyovers.<br><br>" .
             "You can check our <a href=\"specialization-bridges.php\" style=\"text-decoration:underline; font-weight:bold; color:#1d4ed8;\">Bridge & Elevated Structure projects here</a>.<br><br>" .
             "To discuss your bridge specifications or tender details, please get in touch with us over " . $contactInfoHTML;
    $chips = ["Call +91 7004709933", "Send Email", "View Services"];
}

// 4. HIGHWAYS, ROADWAYS & EXPRESSWAYS
elseif (containsAny($msg, ['highway', 'road', 'expressway', '4-lane', '6-lane', 'nhai', 'morth', 'asphalt', 'bypass', 'pavement', 'pmgsy'])) {
    $reply = "Yes, we handle large-scale highway engineering! As a Class 1A registered contractor with NHAI & MoRTH, we execute 4-lane/6-lane expansions, flexible asphalt paving (BC/DBM), and rigid concrete roads (PQC).<br><br>" .
             "Explore our <a href=\"specialization-highways.php\" style=\"text-decoration:underline; font-weight:bold; color:#1d4ed8;\">Highway Construction specialization here</a>.<br><br>" .
             "Feel free to connect with our team directly over " . $contactInfoHTML;
    $chips = ["Highway Details", "Contact Team", "Our Services"];
}

// 5. INDUSTRIAL FACILITIES & PEB SHEDS
elseif (containsAny($msg, ['peb', 'shed', 'warehouse', 'factory', 'industrial', 'batching plant', 'cold storage', 'silo'])) {
    $reply = "Yes, we construct heavy commercial & industrial facilities, including Pre-Engineered Building (PEB) sheds up to 60m clear span, factories, warehouses, and FM2 super-flat floors.<br><br>" .
             "Take a look at our <a href=\"specialization-turnkey.php\" style=\"text-decoration:underline; font-weight:bold; color:#1d4ed8;\">Industrial & PEB Shed solutions here</a>.<br><br>" .
             "For architectural plans or layout inquiries, reach out to us at " . $contactInfoHTML;
    $chips = ["PEB Shed Details", "Turnkey EPC", "Contact Team"];
}

// 6. INSTITUTIONAL, SCHOOL, COLLEGE, HOSPITAL & PUBLIC BUILDINGS
elseif (containsAny($msg, ['school', 'college', 'university', 'hospital', 'campus', 'institution', 'secretariat', 'court', 'barrack', 'stadium', 'auditorium'])) {
    $reply = "You're in the right place! We construct purpose-built institutional infrastructure, including schools, university campuses, multispecialty hospitals, high court annexes, and administrative complexes.<br><br>" .
             "You can view our <a href=\"specialization-institutional.php\" style=\"text-decoration:underline; font-weight:bold; color:#1d4ed8;\">Institutional Infrastructure projects here</a>.<br><br>" .
             "Please reach out to our team at " . $contactInfoHTML . " to discuss your project requirements.";
    $chips = ["Institutional Projects", "Contact Team", "View Services"];
}

// 7. RESIDENTIAL REAL ESTATE, TOWNSHIPS & LANDOWNER JVs
elseif (containsAny($msg, ['residential', 'township', 'housing', 'tower', 'high-rise', 'joint venture', 'jv', 'landowner', 'developer', 'pmay'])) {
    $reply = "Yes, we execute high-density residential towers, mass housing townships, and active landowner Joint Venture (JV) partnerships.<br><br>" .
             "Check out our <a href=\"specialization-residential.php\" style=\"text-decoration:underline; font-weight:bold; color:#1d4ed8;\">Residential Township engineering here</a>.<br><br>" .
             "If you are a landowner or developer looking to collaborate, connect with us over " . $contactInfoHTML;
    $chips = ["Township Details", "Landowner JV", "Contact Team"];
}

// 8. MACHINERY, FLEET & ASSETS
elseif (containsAny($msg, ['machinery', 'equipment', 'crane', 'paver', 'roller', 'compactor', 'excavator', 'pile driver', 'fleet'])) {
    $reply = "AIPL owns a complete fleet of heavy civil machinery — including hydraulic crawler pile drivers, automated concrete batching plants, tower cranes, and electronic sensor pavers.<br><br>" .
             "For fleet deployment details, contact us over " . $contactInfoHTML;
    $chips = ["Our Services", "Company Portfolio", "Contact Us"];
}

// 9. SPECIFIC INFRASTRUCTURE PROJECT INQUIRIES ("how do i build...", "can you construct...")
elseif (containsAny($msg, ['construction project', 'infrastructure project', 'civil project', 'engineering project', 'heavy construction', 'contractor', 'bidding', 'tender'])) {
    $reply = "Welcome to Azores Infrastructure! We are a Class 1A Government Registered Contractor specializing in heavy civil works: <a href=\"specialization-highways.php\" style=\"text-decoration:underline; font-weight:bold; color:#1d4ed8;\">Highways</a>, <a href=\"specialization-bridges.php\" style=\"text-decoration:underline; font-weight:bold; color:#1d4ed8;\">Bridges</a>, <a href=\"specialization-turnkey.php\" style=\"text-decoration:underline; font-weight:bold; color:#1d4ed8;\">Turnkey EPC</a>, <a href=\"specialization-institutional.php\" style=\"text-decoration:underline; font-weight:bold; color:#1d4ed8;\">Institutional Buildings</a>, and <a href=\"specialization-residential.php\" style=\"text-decoration:underline; font-weight:bold; color:#1d4ed8;\">Townships</a>.<br><br>" .
             "Feel free to reach out over " . $contactInfoHTML . " for any project inquiries.";
    $chips = ["Bridge Projects", "Highways", "Contact Us"];
}

// 10. UNCERTAIN BUSINESS / PROJECT QUERIES ("can you do it for free?", custom cost, non-standard project request)
elseif (containsAny($msg, ['free', 'cost', 'discount', 'price', 'rate', 'estimate', 'quotation', 'timeline', 'duration', 'consult', 'consultation', 'hire', 'fee', 'charge', 'can you do'])) {
    $reply = "I cannot help you with that currently but you can reach out to us at " . $contactInfoHTML . " and enquire about it.";
    $chips = ["Call +91 7004709933", "Send Email", "Contact Team"];
}

// 11. GREETINGS & INTROS
elseif (preg_match('/^(hi|hello|hey|sup|yo|greetings|good morning|good afternoon|namaste)[!.,\s]*$/i', $msg) || $msg === 'who are you' || $msg === 'what is this') {
    $reply = "Hello! 👋 Welcome to <strong>Azores Infrastructure Private Limited</strong>. How can I assist you with your construction or infrastructure requirements today?<br><br>" .
             "You can explore our <a href=\"specialization-highways.php\" style=\"text-decoration:underline; font-weight:bold; color:#1d4ed8;\">Highways</a>, <a href=\"specialization-bridges.php\" style=\"text-decoration:underline; font-weight:bold; color:#1d4ed8;\">Bridges</a>, or <a href=\"specialization-turnkey.php\" style=\"text-decoration:underline; font-weight:bold; color:#1d4ed8;\">Turnkey EPC projects</a>.";
    $chips = ["Our Services", "Class 1A Credentials", "Contact Us"];
}

// 12. LEADERSHIP & MANAGEMENT
elseif (containsAny($msg, ['ranvijay', 'pradhan', 'managing director', 'founder', 'director', 'ceo', 'owner', 'leadership'])) {
    $reply = "Azores Infrastructure is led by <strong>Mr. Ranvijay Pradhan</strong> (Founder & Managing Director). He holds a B.Tech in Mechanical Engineering and brings 29+ years of construction industry experience, having delivered over 120+ government infrastructure projects across India.<br><br>" .
             "Connect with management over " . $contactInfoHTML;
    $chips = ["Class 1A Credentials", "Company Truths", "Contact Us"];
}

// 13. VERIFICATION, CIN, STAGING URL & GMAIL MISCONCEPTIONS
elseif (containsAny($msg, ['fake', 'staging', 'temporary', 'unverified', 'domain', 'url', 'ranchiwebsite', 'cin', 'gmail', 'email handle', 'email address', 'legit', 'real', 'trust', 'employee', 'payroll'])) {
    $reply = "<strong>Fact:</strong> AIPL is a permanent Class 1A Government Contractor registered under MCA CIN (since 2010) with 29+ years of engineering experience and 120+ completed projects.<br><br>" .
             "Legacy contractors across India maintain original MCA-registered handles (Azores.ranchi@gmail.com) for official tender filing security.<br><br>" .
             "Official contact: " . $contactInfoHTML;
    $chips = ["Class 1A Credentials", "Company Truths", "Contact Us"];
}

// 14. OFFICES & LOCATIONS
elseif (containsAny($msg, ['delhi', 'jharkhand', 'ranchi', 'office', 'headquarter', 'location', 'address', 'branch', 'where'])) {
    $reply = "📍 <strong>Corporate Office & Fleet Yard:</strong> Ranchi, Jharkhand<br>🏢 <strong>Bidding & Finance Hub:</strong> New Delhi<br><br>" .
             "Operating bidding hubs in New Delhi alongside regional machinery yards in Jharkhand is standard practice for national Class 1A contractors.<br><br>" .
             "Contact office: " . $contactInfoHTML;
    $chips = ["Machinery Fleet", "Contact Us", "Our Services"];
}

// 15. GENERAL FALLBACK (For ambiguous or general project inquiries)
else {
    $reply = "I would be glad to help! To give you the exact information you need, please let me know what your project is about (e.g., Highways, Bridges, Turnkey EPC, Institutional Buildings, or Residential Townships), or reach out directly to our team at 📞 <strong>+91 7004709933</strong> | 📧 <strong>Azores.ranchi@gmail.com</strong>.";
    $chips = ["Highways & Roads", "Bridges & Flyovers", "Turnkey EPC"];
}


echo json_encode(['status' => 'success', 'reply' => $reply, 'suggestions' => $chips, 'engine' => 'free-nlp-knowledge-engine']);





