<?php
/**
 * Azores AI Chatbot Core Module
 * Included in F:\Azores\footer.php so it automatically appears on all pages of the Azores site.
 */
?>
<!-- ═══════════════════════════════════════════════════════════════
     AZORES AI CHATBOT — Modular Standalone Component
═══════════════════════════════════════════════════════════════ -->
<style>
/* ── RESET & BASE ── */
#azWidget * { box-sizing: border-box; margin: 0; padding: 0; }
#azWidget { font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif; font-size: 14px; line-height: 1.5; }

/* ── LAUNCHER BUTTON ── */
#azLauncher {
    position: fixed;
    bottom: 28px;
    right: 28px;
    width: 62px;
    height: 62px;
    border-radius: 50%;
    background: linear-gradient(145deg, #02016A 0%, #0434dc 100%);
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10000;
    box-shadow: 0 8px 28px rgba(4,52,220,0.45), 0 2px 8px rgba(0,0,0,0.2);
    transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.3s ease;
    outline: none;
}
#azLauncher:hover {
    transform: scale(1.1) translateY(-2px);
    box-shadow: 0 14px 36px rgba(4,52,220,0.5), 0 4px 12px rgba(0,0,0,0.2);
}
#azLauncher .az-icon { color: #fff; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; }
#azLauncher .az-icon-chat { }
#azLauncher .az-icon-x  { display: none; }

/* Launcher pulse ring */
#azLauncher::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 2px solid rgba(4,52,220,0.5);
    animation: azPulseRing 2.4s cubic-bezier(0.4,0,0.6,1) infinite;
}
@keyframes azPulseRing {
    0%   { transform: scale(1);   opacity: 0.8; }
    70%  { transform: scale(1.5); opacity: 0;   }
    100% { transform: scale(1.5); opacity: 0;   }
}

/* Notification badge */
#azBadge {
    position: absolute;
    top: -2px;
    right: -2px;
    min-width: 20px;
    height: 20px;
    background: #ef4444;
    border: 2.5px solid #fff;
    border-radius: 10px;
    color: #fff;
    font-size: 10px;
    font-weight: 700;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 0 4px;
    animation: azBadgePop 0.35s cubic-bezier(0.34,1.56,0.64,1);
}
@keyframes azBadgePop { from { transform: scale(0); } to { transform: scale(1); } }

/* ── PROACTIVE BUBBLE ── */
#azProactive {
    position: fixed;
    bottom: 102px;
    right: 28px;
    background: #fff;
    border-radius: 18px 18px 4px 18px;
    padding: 14px 18px 14px 16px;
    box-shadow: 0 12px 40px rgba(0,0,0,0.14), 0 0 0 1px rgba(0,0,0,0.06);
    max-width: 260px;
    z-index: 9999;
    display: none;
    animation: azProPop 0.4s cubic-bezier(0.34,1.56,0.64,1);
}
@keyframes azProPop { from { opacity:0; transform: translateY(12px) scale(0.92); } to { opacity:1; transform:none; } }
#azProactive p { font-size: 13.5px; color: #1e293b; line-height: 1.55; padding-right: 18px; }
#azProClose {
    position: absolute;
    top: 8px;
    right: 10px;
    background: none;
    border: none;
    color: #94a3b8;
    cursor: pointer;
    font-size: 15px;
    line-height: 1;
    padding: 2px;
    transition: color 0.2s;
}
#azProClose:hover { color: #475569; }

/* ── CHAT WINDOW ── */
#azWindow {
    position: fixed;
    bottom: 104px;
    right: 28px;
    width: 384px;
    max-width: calc(100vw - 40px);
    height: 580px;
    max-height: calc(100vh - 130px);
    background: #fff;
    border-radius: 22px;
    box-shadow: 0 24px 64px rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.06);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    z-index: 9998;
    opacity: 0;
    visibility: hidden;
    transform: translateY(24px) scale(0.96);
    transition: all 0.35s cubic-bezier(0.34,1.56,0.64,1);
    pointer-events: none;
}
#azWindow.az-open {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
    pointer-events: all;
}

/* ── HEADER ── */
.az-header {
    background: linear-gradient(135deg, #02016A 0%, #0f47e8 100%);
    padding: 16px 18px;
    display: flex;
    align-items: center;
    gap: 12px;
    flex-shrink: 0;
    position: relative;
}
.az-header::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 1px;
    background: rgba(255,255,255,0.1);
}
.az-hdr-avatar {
    width: 44px;
    height: 44px;
    border-radius: 14px;
    background: rgba(255,255,255,0.12);
    border: 1.5px solid rgba(255,255,255,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: #fff;
    font-weight: 800;
    font-size: 17px;
    letter-spacing: -0.5px;
    overflow: hidden;
}
.az-hdr-info { flex: 1; min-width: 0; }
.az-hdr-name { color: #fff; font-size: 15px; font-weight: 700; letter-spacing: -0.02em; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.az-hdr-sub  { font-size: 11px; color: rgba(255,255,255,0.65); margin-top: 2px; display: flex; align-items: center; gap: 5px; }
.az-dot {
    width: 7px; height: 7px;
    background: #10b981;
    border-radius: 50%;
    display: inline-block;
    animation: azBlink 2s ease-in-out infinite;
    flex-shrink: 0;
}
@keyframes azBlink { 0%,100%{opacity:1;} 50%{opacity:0.4;} }
.az-hdr-close {
    width: 32px; height: 32px;
    border-radius: 50%;
    background: rgba(255,255,255,0.1);
    border: none;
    color: rgba(255,255,255,0.75);
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.2s;
    flex-shrink: 0;
}
.az-hdr-close:hover { background: rgba(255,255,255,0.2); color: #fff; }

/* ── MESSAGES AREA ── */
#azMsgs {
    flex: 1;
    overflow-y: auto;
    padding: 18px 16px 8px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    background: #f8fafc;
    scroll-behavior: smooth;
}
#azMsgs::-webkit-scrollbar { width: 3px; }
#azMsgs::-webkit-scrollbar-track { background: transparent; }
#azMsgs::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 2px; }

/* ── SERVICE CAPSULES & HOVER PREVIEW ── */
.az-capsules-list {
    margin: 8px 0 4px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 6px;
    width: 100%;
    box-sizing: border-box;
}
.az-capsule-btn {
    display: inline-flex;
    flex-direction: column;
    align-items: flex-start;
    width: fit-content;
    max-width: 100%;
    align-self: flex-start;
    padding: 6px 13px;
    border: 1.5px solid #1d4ed8;
    border-radius: 18px;
    background: #ffffff;
    color: #1d4ed8 !important;
    text-decoration: none !important;
    font-weight: 600;
    font-size: 11.5px;
    line-height: 1.35;
    white-space: normal;
    word-break: break-word;
    transition: all 0.2s ease;
    box-shadow: 0 1px 3px rgba(0,0,0,0.03);
}
.az-capsule-btn:hover {
    background: #1d4ed8;
    color: #ffffff !important;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(29,78,216,0.25);
    border-color: #1e40af;
}
.az-capsule-title {
    display: block;
    line-height: 1.3;
}
.az-capsule-hover-url {
    display: none;
    margin-top: 2px;
    font-size: 10px;
    font-weight: 500;
    color: #93c5fd;
    letter-spacing: 0.2px;
}
.az-capsule-btn:hover .az-capsule-hover-url {
    display: inline-block;
    color: #e0f2fe;
}

/* Date separator */
.az-date-sep {
    text-align: center;
    font-size: 10.5px;
    color: #94a3b8;
    margin: 6px 0 3px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.az-date-sep::before, .az-date-sep::after {
    content: '';
    flex: 1;
    height: 1px;
    background: #e2e8f0;
}

/* Message row */
.az-msg-row {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 8px;
    animation: azMsgIn 0.28s ease;
    width: 100%;
    box-sizing: border-box;
}
@keyframes azMsgIn { from { opacity:0; transform:translateY(8px); } to { opacity:1; transform:none; } }
.az-msg-row.az-bot  { align-self: flex-start; }
.az-msg-row.az-user { align-self: flex-end;   flex-direction: row-reverse; }

/* Avatar */
.az-av {
    width: 34px; height: 34px;
    border-radius: 10px;
    background: linear-gradient(135deg, #02016A, #0434dc);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    color: #fff;
    font-weight: 800;
    font-size: 13px;
    letter-spacing: -0.5px;
    margin-top: 2px;
}
.az-user .az-av { background: linear-gradient(135deg, #475569, #334155); }

/* Bubble */
.az-bubble-wrap { display: flex; flex-direction: column; max-width: calc(100% - 50px); min-width: 0; }
.az-user .az-bubble-wrap { align-items: flex-end; }

.az-bubble {
    padding: 14px 18px;
    border-radius: 20px;
    font-size: 13.5px;
    line-height: 1.6;
    word-break: break-word;
    overflow-wrap: break-word;
    box-sizing: border-box;
}
.az-bot  .az-bubble { background: #ffffff; color: #1e293b; border: 1px solid #e2e8f0; border-top-left-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
.az-user .az-bubble { background: linear-gradient(135deg, #02016A 0%, #0434dc 100%); color: #ffffff; border-top-right-radius: 4px; box-shadow: 0 4px 14px rgba(4,52,220,0.25); }

/* Links inside bot bubbles */
.az-bot .az-bubble a { color: #1d4ed8; text-decoration: underline; font-weight: 600; word-break: break-word; }
.az-bot .az-bubble p { margin: 0 0 10px 0; }
.az-bot .az-bubble p:last-child { margin-bottom: 0; }

/* Lists inside bubbles */
.az-bot .az-bubble ul, .az-bot .az-bubble ol { padding-left: 20px; margin: 8px 0 4px; }
.az-bot .az-bubble li { margin-bottom: 5px; line-height: 1.5; }

/* Timestamp */
.az-ts { font-size: 10px; color: #94a3b8; margin-top: 5px; padding: 0 4px; }

/* ── TYPING INDICATOR ── */
#azTyping {
    display: none;
    align-items: flex-start;
    gap: 12px;
    padding: 0 16px 8px;
    flex-shrink: 0;
    animation: azMsgIn 0.25s ease;
}
.az-typing-bubble {
    background: #fff;
    border: 1px solid #e8eef4;
    border-radius: 20px;
    border-top-left-radius: 4px;
    padding: 14px 18px;
    display: flex;
    gap: 6px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}
.az-dot-bounce {
    width: 7px; height: 7px;
    background: #94a3b8;
    border-radius: 50%;
    animation: azDotBounce 1.3s ease-in-out infinite;
}
.az-dot-bounce:nth-child(2) { animation-delay: 0.18s; }
.az-dot-bounce:nth-child(3) { animation-delay: 0.36s; }
@keyframes azDotBounce {
    0%,60%,100% { transform: translateY(0); opacity: 0.45; }
    30%          { transform: translateY(-7px); opacity: 1; }
}

/* ── QUICK REPLY CHIPS ── */
#azChips {
    padding: 12px 16px 10px;
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    background: #f8fafc;
    border-top: 1px solid #f1f5f9;
    flex-shrink: 0;
    min-height: 0;
    box-sizing: border-box;
    width: 100%;
}
.az-chip {
    background: #ffffff;
    border: 1.5px solid #1d4ed8;
    color: #1d4ed8;
    padding: 8px 16px;
    border-radius: 22px;
    font-size: 12px;
    font-weight: 600;
    line-height: 1.4;
    cursor: pointer;
    transition: all 0.2s ease;
    white-space: nowrap;
    font-family: inherit;
    box-shadow: 0 1px 3px rgba(0,0,0,0.04);
}
.az-chip:hover {
    background: #1d4ed8;
    color: #ffffff;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(29,78,216,0.25);
}

/* Inline chips under bot message bubbles */
.az-msg-inline-chips {
    margin-top: 8px;
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    width: 100%;
}
.az-inline-chip {
    padding: 6px 13px;
    font-size: 11.5px;
    border-radius: 18px;
}

/* ── INPUT AREA ── */
.az-input-area {
    padding: 12px 16px;
    background: #ffffff;
    border-top: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
    box-sizing: border-box;
}
#azInput {
    flex: 1;
    border: 1.5px solid #cbd5e1;
    border-radius: 26px;
    padding: 10px 16px;
    font-size: 13.5px;
    font-family: inherit;
    outline: none;
    background: #f8fafc;
    transition: border-color 0.2s, background 0.2s;
    color: #1e293b;
}
#azInput::placeholder { color: #94a3b8; }
#azInput:focus { border-color: #0434dc; background: #fff; }
#azInput:disabled { opacity: 0.6; }

#azSend {
    width: 42px; height: 42px;
    border-radius: 50%;
    background: linear-gradient(135deg, #02016A, #0434dc);
    border: none;
    color: #fff;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.2s ease;
    flex-shrink: 0;
    box-shadow: 0 3px 10px rgba(4,52,220,0.3);
}
#azSend:hover  { transform: scale(1.08); box-shadow: 0 5px 16px rgba(4,52,220,0.4); }
#azSend:active { transform: scale(0.96); }
#azSend:disabled { opacity: 0.45; cursor: not-allowed; transform: none; }

/* ── POWERED BY ── */
.az-powered {
    text-align: center;
    padding: 8px 16px 12px;
    font-size: 11px;
    font-weight: 500;
    color: #94a3b8;
    background: #ffffff;
    border-top: 1px solid #f1f5f9;
    flex-shrink: 0;
    letter-spacing: 0.1px;
}
.az-powered strong { color: #02016A; font-weight: 700; }

/* ── HANDOFF CARD ── */
.az-handoff-card {
    background: linear-gradient(135deg, #f0f7ff, #e8f1fd);
    border: 1px solid #c3d9fa;
    border-radius: 14px;
    padding: 14px;
    margin-top: 6px;
}
.az-handoff-card h5 { color: #1e40af; font-size: 12.5px; font-weight: 700; margin-bottom: 10px; }
.az-handoff-btn {
    display: flex;
    align-items: center;
    gap: 9px;
    width: 100%;
    padding: 9px 12px;
    border-radius: 9px;
    font-size: 12.5px;
    font-weight: 600;
    font-family: inherit;
    cursor: pointer;
    border: none;
    margin-bottom: 7px;
    transition: all 0.2s;
    text-decoration: none;
    color: inherit;
}
.az-handoff-btn:last-child { margin-bottom: 0; }
.az-hb-call  { background: linear-gradient(135deg, #02016A, #0434dc); color: #fff !important; }
.az-hb-email { background: #fff; color: #1e40af !important; border: 1.5px solid #c3d9fa; }
.az-handoff-btn:hover { opacity: 0.88; transform: translateX(3px); }

/* ── RATING ── */
.az-rating-row { display: flex; align-items: center; gap: 8px; margin-top: 10px; flex-wrap: wrap; }
.az-rating-label { font-size: 11.5px; color: #64748b; }
.az-rate-btn {
    width: 30px; height: 30px;
    border-radius: 50%;
    border: 1.5px solid #e2e8f0;
    background: #fff;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    font-size: 15px;
    transition: all 0.2s;
}
.az-rate-btn:hover { background: #f0fdf4; border-color: #10b981; transform: scale(1.15); }

/* ── MOBILE ── */
@media (max-width: 500px) {
    #azWindow { right: 0; bottom: 0; width: 100%; height: 100%; max-height: 100%; border-radius: 0; }
    #azLauncher { right: 18px; bottom: 18px; }
    #azProactive { right: 18px; }
}
</style>

<!-- ═══ WIDGET HTML ═══ -->
<div id="azWidget">

    <!-- Proactive greeting bubble -->
    <div id="azProactive">
        <button id="azProClose" aria-label="Dismiss">&#x2715;</button>
        <p>👋 Hi there! I'm <strong>Azores AI</strong>. Need help with a construction or infrastructure project?</p>
    </div>

    <!-- Chat window -->
    <div id="azWindow" role="dialog" aria-label="Azores AI Chat" aria-modal="true">

        <!-- Header -->
        <div class="az-header">
            <div class="az-hdr-avatar">A</div>
            <div class="az-hdr-info">
                <div class="az-hdr-name">Azores AI Assistant</div>
                <div class="az-hdr-sub">
                    <span class="az-dot"></span>
                    Online &nbsp;·&nbsp; Replies instantly
                </div>
            </div>
            <button class="az-hdr-close" id="azClose" aria-label="Close chat">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>

        <!-- Messages -->
        <div id="azMsgs" role="log" aria-live="polite" aria-label="Chat messages"></div>

        <!-- Typing indicator -->
        <div id="azTyping" aria-label="Azores AI is typing">
            <div class="az-av">A</div>
            <div class="az-typing-bubble">
                <div class="az-dot-bounce"></div>
                <div class="az-dot-bounce"></div>
                <div class="az-dot-bounce"></div>
            </div>
        </div>

        <!-- Quick reply chips -->
        <div id="azChips" aria-label="Suggested replies"></div>

        <!-- Input -->
        <div class="az-input-area">
            <input id="azInput" type="text" placeholder="Type a message…" maxlength="500" autocomplete="off" aria-label="Type your message">
            <button id="azSend" aria-label="Send message">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
            </button>
        </div>

        <div class="az-powered">Powered by <strong>Azores AI</strong> &nbsp;·&nbsp; Class 1A Infrastructure</div>
    </div>

    <!-- Launcher FAB -->
    <button id="azLauncher" aria-label="Open Azores AI chat" aria-expanded="false">
        <span id="azBadge" aria-label="Unread messages"></span>
        <span class="az-icon az-icon-chat">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </span>
        <span class="az-icon az-icon-x">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </span>
    </button>
</div>

<!-- ═══ CHAT JAVASCRIPT ═══ -->
<script>
(function() {
    'use strict';

    /* ── DOM ── */
    const el = id => document.getElementById(id);
    const launcher  = el('azLauncher');
    const window_   = el('azWindow');
    const closeBtn  = el('azClose');
    const msgs      = el('azMsgs');
    const typing    = el('azTyping');
    const chipsWrap = el('azChips');
    const input     = el('azInput');
    const sendBtn   = el('azSend');
    const badge     = el('azBadge');
    const proactive = el('azProactive');
    const proClose  = el('azProClose');

    /* ── STATE ── */
    let isOpen        = false;
    let isBusy        = false;
    let history       = [];
    let unread        = 0;
    let msgCount      = 0;
    let ratingShown   = false;
    let proTimer      = null;

    /* ── HELPERS ── */
    function now() {
        const d = new Date();
        return d.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    }

    function typingMs(text) {
        const clean = text.replace(/<[^>]*>/g, '');
        return Math.min(Math.max(clean.length * 18, 900), 2800);
    }

    function scrollBottom() {
        msgs.scrollTo({ top: msgs.scrollHeight, behavior: 'smooth' });
    }

    function setBadge(n) {
        unread = n;
        if (n > 0) {
            badge.textContent = n > 9 ? '9+' : n;
            badge.style.display = 'flex';
        } else {
            badge.style.display = 'none';
        }
    }

    /* ── OPEN / CLOSE ── */
    function openChat() {
        isOpen = true;
        window_.classList.add('az-open');
        launcher.setAttribute('aria-expanded', 'true');
        launcher.querySelector('.az-icon-chat').style.display = 'none';
        launcher.querySelector('.az-icon-x').style.display   = 'flex';
        if (proactive) proactive.style.display = 'none';
        clearTimeout(proTimer);
        setBadge(0);
        setTimeout(() => { input.focus(); scrollBottom(); }, 380);

        // First-open welcome message
        if (msgCount === 0) {
            setTimeout(() => {
                showTyping(800);
                setTimeout(() => {
                    hideTyping();
                    addBotMsg(
                        "Hello! 👋 Welcome to <strong>Azores Infrastructure</strong>. I'm <strong>Azores AI</strong> — how can I assist you with your construction or infrastructure requirements today?",
                        ["About Us", "Contact Us", "Our Services", "Our Specializations", "Location"]
                    );
                }, 900);
            }, 300);
        }
    }

    function closeChat() {
        isOpen = false;
        window_.classList.remove('az-open');
        launcher.setAttribute('aria-expanded', 'false');
        launcher.querySelector('.az-icon-chat').style.display = 'flex';
        launcher.querySelector('.az-icon-x').style.display   = 'none';
        if (msgCount > 0) setBadge(0);
    }

    launcher.addEventListener('click', () => isOpen ? closeChat() : openChat());
    closeBtn.addEventListener('click', closeChat);

    /* ── AUTO OPEN CHAT POPUP ON PAGE VISIT ── */
    proTimer = setTimeout(() => {
        if (!isOpen) {
            openChat();
        }
    }, 1200);

    /* ── TYPING INDICATOR ── */
    function showTyping(duration) {
        typing.style.display = 'flex';
        sendBtn.disabled = true;
        input.disabled   = true;
        scrollBottom();
    }
    function hideTyping() {
        typing.style.display = 'none';
        sendBtn.disabled = false;
        input.disabled   = false;
    }

    /* ── CHIPS ── */
    function setChips(suggestions) {
        chipsWrap.innerHTML = '';
        if (!suggestions || !suggestions.length) {
            chipsWrap.style.display = 'none';
            return;
        }
        suggestions.forEach(s => {
            if (!s || !s.trim()) return;
            const btn = document.createElement('button');
            btn.className = 'az-chip';
            btn.textContent = s.trim();

            // Special chip actions
            btn.addEventListener('click', (e) => {
                if (e) e.stopPropagation();
                const t = s.toLowerCase().trim();
                if (t.startsWith('call') || t.includes('+91') || t.includes('7004709933')) {
                    window.open('tel:+917004709933', '_self'); return;
                }
                if (t.startsWith('email') || t.includes('email')) {
                    window.open('mailto:Azores.ranchi@gmail.com', '_self'); return;
                }
                sendMessage(s.trim(), true);
            });
            chipsWrap.appendChild(btn);
        });
        chipsWrap.style.display = 'flex';
    }

    /* ── ADD MESSAGES ── */
    function addBotMsg(html, suggestions, isFromCapsuleClick = false) {
        msgCount++;

        const row = document.createElement('div');
        row.className = 'az-msg-row az-bot';

        // Avatar
        const av = document.createElement('div');
        av.className = 'az-av';
        av.textContent = 'A';

        // Bubble wrap
        const wrap = document.createElement('div');
        wrap.className = 'az-bubble-wrap';

        const bubble = document.createElement('div');
        bubble.className = 'az-bubble';
        bubble.innerHTML = html;

        wrap.appendChild(bubble);

        // Persistent inline chips under this message bubble
        if (suggestions && suggestions.length > 0) {
            const inlineChips = document.createElement('div');
            inlineChips.className = 'az-msg-inline-chips';
            suggestions.forEach(s => {
                if (!s || !s.trim()) return;
                const btn = document.createElement('button');
                btn.className = 'az-chip az-inline-chip';
                btn.textContent = s.trim();
                btn.addEventListener('click', (e) => {
                    if (e) e.stopPropagation();
                    const t = s.toLowerCase().trim();
                    if (t.startsWith('call') || t.includes('+91') || t.includes('7004709933')) {
                        window.open('tel:+917004709933', '_self'); return;
                    }
                    if (t.startsWith('email') || t.includes('email')) {
                        window.open('mailto:Azores.ranchi@gmail.com', '_self'); return;
                    }
                    sendMessage(s.trim(), true);
                });
                inlineChips.appendChild(btn);
            });
            wrap.appendChild(inlineChips);
        }

        const ts = document.createElement('div');
        ts.className = 'az-ts';
        ts.textContent = now();
        wrap.appendChild(ts);

        row.appendChild(av);
        row.appendChild(wrap);
        msgs.appendChild(row);

        // Handoff card detection
        if (html.toLowerCase().includes('call +91') || html.toLowerCase().includes('request callback')) {
            const card = buildHandoffCard();
            wrap.appendChild(card);
        }

        scrollBottom();

        // Bottom chips behavior: Only show bottom chips if query originated from a capsule click
        if (isFromCapsuleClick && suggestions && suggestions.length) {
            setChips(suggestions);
        } else {
            chipsWrap.innerHTML = '';
            chipsWrap.style.display = 'none';
        }

        // Rating after 6 bot messages
        if (msgCount >= 6 && !ratingShown) {
            ratingShown = true;
            setTimeout(showRating, 600);
        }

        if (!isOpen) setBadge(unread + 1);
    }

    function addUserMsg(text) {
        chipsWrap.innerHTML = '';
        chipsWrap.style.display = 'none';
        const row = document.createElement('div');
        row.className = 'az-msg-row az-user';

        const av = document.createElement('div');
        av.className = 'az-av';
        av.textContent = 'U';

        const wrap = document.createElement('div');
        wrap.className = 'az-bubble-wrap';

        const bubble = document.createElement('div');
        bubble.className = 'az-bubble';
        bubble.textContent = text;

        const ts = document.createElement('div');
        ts.className = 'az-ts';
        ts.textContent = now();

        wrap.appendChild(bubble);
        wrap.appendChild(ts);
        row.appendChild(wrap);
        row.appendChild(av);
        msgs.appendChild(row);
        scrollBottom();
    }

    /* ── HANDOFF CARD ── */
    function buildHandoffCard() {
        const card = document.createElement('div');
        card.className = 'az-handoff-card';
        card.innerHTML = `
            <h5>🤝 Connect directly with our team</h5>
            <a href="tel:+917004709933" class="az-handoff-btn az-hb-call">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.18 2 2 0 0 1 3.59 1h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                Call +91 7004709933
            </a>
            <a href="https://wa.me/917004709933" target="_blank" class="az-handoff-btn" style="background:linear-gradient(135deg, #16a34a, #15803d);color:#fff !important;">
                💬 WhatsApp +91 7004709933
            </a>
            <a href="mailto:Azores.ranchi@gmail.com" class="az-handoff-btn az-hb-email">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                Email Azores.ranchi@gmail.com
            </a>
            <a href="https://maps.google.com/?q=Azores+Infrastructure+Private+Limited+Ranchi+Jharkhand" target="_blank" class="az-handoff-btn" style="background:#fff;color:#1e40af !important;border:1.5px solid #c3d9fa;">
                📍 Corporate Office (Google Maps)
            </a>
        `;
        return card;
    }

    /* ── RATING ── */
    function showRating() {
        const row = document.createElement('div');
        row.className = 'az-msg-row az-bot';
        row.innerHTML = `
            <div class="az-av">A</div>
            <div class="az-bubble-wrap">
                <div class="az-bubble" style="background:#f0f7ff;border-color:#c3d9fa;">
                    <div style="font-size:12.5px;color:#1e40af;font-weight:600;margin-bottom:8px;">Was this conversation helpful?</div>
                    <div class="az-rating-row">
                        <button class="az-rate-btn" title="Yes, helpful!" onclick="this.closest('.az-rating-row').innerHTML='<span style=&quot;font-size:12px;color:#10b981;font-weight:600;&quot;>Thank you! 🎉</span>'">👍</button>
                        <button class="az-rate-btn" title="Needs improvement" onclick="this.closest('.az-rating-row').innerHTML='<span style=&quot;font-size:12px;color:#64748b;font-weight:600;&quot;>Thanks for the feedback!</span>'">👎</button>
                    </div>
                </div>
            </div>
        `;
        msgs.appendChild(row);
        scrollBottom();
    }

    /* ── SEND MESSAGE ── */
    function sendMessage(text, isFromCapsuleClick = false) {
        text = (text || '').trim();
        if (!text || isBusy) return;

        isBusy = true;
        addUserMsg(text);
        history.push({ role: 'user', content: text });
        input.value = '';
        sendBtn.disabled = true;

        const delay = typingMs(text);
        showTyping(delay);

        fetch('api-chat.php', {
            method:  'POST',
            headers: { 'Content-Type': 'application/json' },
            body:    JSON.stringify({ message: text, history: history })
        })
        .then(r => {
            if (!r.ok) {
                throw new Error('HTTP error ' + r.status);
            }
            return r.json();
        })
        .then(data => {
            setTimeout(() => {
                hideTyping();
                if (data && data.status === 'success' && data.reply) {
                    addBotMsg(data.reply, data.suggestions || [], isFromCapsuleClick);
                    history.push({ role: 'model', content: data.reply });
                } else if (data && data.reply) {
                    addBotMsg(data.reply, data.suggestions || ["Our services", "Contact us"], isFromCapsuleClick);
                } else {
                    addBotMsg("Thank you for reaching out to <strong>Azores Infrastructure</strong>. How can we assist your project needs today?", ["Our services", "Contact us"], isFromCapsuleClick);
                }
                isBusy = false;
                sendBtn.disabled = false;
                input.focus();
            }, Math.max(delay - 200, 700));
        })
        .catch(err => {
            console.error('Chatbot API fetch error:', err);
            setTimeout(() => {
                hideTyping();
                addBotMsg(
                    "Thank you for reaching out to <strong>Azores Infrastructure Private Limited</strong>. We specialize in Class 1A heavy infrastructure, pre-stressed bridges, and turnkey EPC projects.<br><br>How can we assist your project needs today?",
                    ["Our services", "Class 1A Credentials", "Contact us"],
                    isFromCapsuleClick
                );
                isBusy = false;
                sendBtn.disabled = false;
            }, 900);
        });
    }

    /* ── EVENT LISTENERS ── */
    sendBtn.addEventListener('click', () => sendMessage(input.value));

    input.addEventListener('keydown', e => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage(input.value);
        }
    });

    // Live send button state
    input.addEventListener('input', () => {
        sendBtn.style.opacity = input.value.trim() ? '1' : '0.6';
    });

    // Keyboard: Escape closes chat
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && isOpen) closeChat();
    });

    // Click outside to close (safeguarded against detached elements like clicked chips)
    document.addEventListener('click', e => {
        if (!isOpen) return;
        if (!document.body.contains(e.target) || window_.contains(e.target) || launcher.contains(e.target)) {
            return;
        }
        closeChat();
    });

    /* ── INIT ── */
    sendBtn.style.opacity = '0.6';

})();
</script>
