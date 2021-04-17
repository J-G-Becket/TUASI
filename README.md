# TUASI
The User Aggregated Search Index

TUASI is an anonymous URL indexing / searching tool written in PHP.
Users can add, search or rate URLs, impacting search results in real-time.
The default 'User Added' database, contains only results manually added by users.
The 'Crawler Added' database, contains only results added automatically by the spider.
Rating any URL up or down, influences its ranking in search results matching queries.
The spider selects a random URL from the 'Crawler Added' database, crawls it looking for any other URLs on the page, then proceeds to crawl and index any found URLs for up to 5 minutes, then resets itself and repeats.
Multiple spider instances can be ran at once, beta testing ran 20 consecutively before socket issues.

The TUASI project is free and opensource, created in my spare time. If you would like to support my work, or make a donation to me for my efforts, please get in touch with me directly - staff@tuasi.com
