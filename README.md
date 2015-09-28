# CalendarWidget
Widgets for Google calendar events


## Requirement
### PHP ICS Parser

This project need an ICS parser
https://github.com/johngrogg/ics-parser.git
```shell
# git clone https://github.com/johngrogg/ics-parser.git
```
## Config

add a file caled 'cal.url' containing the url to your calendar .ics file

## Minimal Tree


```shell
.
├── cal.url
├── ics-parser
│   ├── class.iCalReader.php
:	:
├── index.php
└── sample.ics
```
