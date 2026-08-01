# INTENT DECIPHERING & NATURAL LANGUAGE RULES

## 1. UNANCHORED PATTERN MATCHING & NAME EXTRACTION
The API must not require strict or rigid string matching. Users speak naturally and combine pleasantries with name introductions.

### Extraction Rules:
- Look for patterns like `im [name]`, `i am [name]`, `i'm [name]`, `my name is [name]`, `this is [name]`, `call me [name]` **anywhere** inside the text.
- Example: `"nice to meet you too, I'm Adity"` $\rightarrow$ Extracts `Adity`
- Example: `"hello good morning I am Rahul"` $\rightarrow$ Extracts `Rahul`
- Example: `"hey there my name is Priya"` $\rightarrow$ Extracts `Priya`

---

## 2. CONVERSATIONAL FILLERS & STRIPPING
Before intent classification, strip conversational leading noise to ensure natural understanding:
- Strip leading words: `okay then`, `ok then`, `so then`, `well then`, `okay`, `ok`, `so`, `well`, `then`, `alright`, `hey AI`, `listen`.

---

## 3. FLEXIBLE KEYWORD & SYNONYM DICTIONARY

| Category | Keywords & Synonyms | Action |
|----------|---------------------|--------|
| **Greetings** | `hi`, `hello`, `hey`, `namaste`, `greetings`, `good morning`, `yo`, `sup` | Return warm greeting |
| **Name Intros** | `I'm`, `I am`, `im`, `my name is`, `call me`, `this is` | Extract name & greet by name |
| **Farewells** | `bye`, `goodbye`, `cya`, `see you`, `talk later`, `exit` | Return polite farewell |
| **Direct Project Ask** | `need help with project`, `want to do project`, `can you build a project`, `help me with my project` | Ask: *"To help you with any such information, first of all I have to know what is your project about"* |
| **Specializations** | `highway`, `road`, `bridge`, `flyover`, `turnkey`, `epb`, `peb`, `institutional`, `hospital`, `residential`, `township` | Return specialization response with link & contacts |
| **Financial / Commercial** | `budget`, `cost`, `expenses`, `expense`, `expenditure`, `pricing`, `rates`, `quote`, `discount`, `manpower`, `timeline`, `materials`, `steel`, `cement` | Return financial redirect contact message |
| **Company / Leadership** | `company`, `about azores`, `who is azores`, `ranvijay pradhan`, `managing director`, `class 1a` | Return company profile & leadership details |
| **Off-Topic / Out of Scope** | `recipe`, `cooking`, `code`, `python`, `math`, `mathematics`, `weather`, `sports`, `movie` | Return friendly off-topic redirection with capsules |
