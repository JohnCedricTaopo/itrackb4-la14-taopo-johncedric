## Lab Activity 12 Answers

### H1. Why was the vendor file not where the mistake was?

The vendor file was where Laravel stopped while trying to run the invalid method call, not where I created the mistake. The exception trace showed the actual problem in my `GenshinImpactController.php` line containing `withh('element')`, so that was the file I needed to fix.

### H2. What can the log line tell me next month that the error page could not?

My `Log::info()` line records that a character was updated and includes the real character ID. Next month I can look in `storage/logs/laravel.log` and know which character was updated, even if nobody is currently looking at the browser or an error page.

### H3. When is 403 better, and when is redirecting with a message better?

A 403 is better when the request must be refused, such as trying to delete the only character in an element group. Redirecting back with a message is better when the request is reasonable but cannot be completed and the user should return to the previous page with an explanation.