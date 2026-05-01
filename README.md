# Visitor IP Logger & Statistics (PHP)

A lightweight, file‑based visitor tracking tool written in pure PHP — no database required.  
This project helps you **log**, **analyze**, and **visualize** visitor IP history for any website.

---

## Features

- Automatically logs each visitor’s IP address
- Stores logs in separate files per page (`ips_page_X.txt`)
- Displays detailed statistics:
  - Unique visitors
  - Repeated visits
  - Most frequent IP
  - Average repeat rate
- Paginated IP viewer (index.php)
- Global statistics dashboard (stat.php)
- Zero dependencies — works on any PHP host
- Super easy to integrate into any existing website

---

## Files Overview

### **index.php**
Tracks and displays visitor IP history.

- Reads previous IPs from `ips_page_X.txt`
- Adds the current visitor's IP
- Updates log file
- Calculates:
  - Unique vs repeated IPs
  - Max repetition
  - Average repetition
- Shows a sorted table of IPs based on frequency
- Includes pagination

Useful for:
- Monitoring real-time traffic
- Checking repeated visits
- Lightweight analytics dashboard

---

### **stat.php**
Aggregates statistics from all pages (up to 100 log files).

- Reads all `ips_page_X.txt` files
- Merges all IPs
- Generates global statistics for the entire site

Useful for:
- Full historical analysis
- Understanding visit frequency patterns
- Overview analytics panel

---

## Installation

1. Upload the files to any PHP-enabled server.
2. Ensure PHP has permission to write `.txt` files.
3. Visit:
   - `index.php` to see logs and live activity
   - `stat.php` to see overall site analytics

No configuration needed.

---

## Use Cases

- Track visitor patterns without using Google Analytics
- Monitor bot or crawler activity
- Anti-abuse / suspicious IP detection
- Simple traffic insight for small websites
- Educational PHP project for logging and file handling

---

## Questions or Improvements?

Feel free to open an issue or submit a pull request.

Enjoy your lightweight visitor tracking system 🚀
