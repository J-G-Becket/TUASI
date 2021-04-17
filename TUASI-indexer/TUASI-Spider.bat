@echo off
mode con: cols=50 lines=10
:goAgain
CLS
"C:\xampp\php\php.exe" -f C:\xampp\TUASI-Indexer\go.php
GOTO :goAgain