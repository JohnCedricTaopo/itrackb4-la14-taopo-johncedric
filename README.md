## Lab Activity 13 Answers

### J1. What does HomeController not have to do?

My HomeController is not a resource controller, so its `index()` method does not have to receive a record ID or perform resource actions such as showing, creating, updating or deleting a Character. It only prepares the two live counts and returns the `home` view.

### J2. Why did the pagination links lose the search term?

Before I added `withQueryString()`, the pagination links only contained the page number. Because the search value was not carried into the next URL, the controller received an empty search value and returned the full list again. `withQueryString()` keeps the search, filter and sort values in every pagination link.

### J3. Why is a misspelled sort value worse than an error, and what does the allowed list do?

A misspelled sort value is worse than an obvious error because the page still loads but the visitor cannot trust the order of the records. My allowed list accepts only `name` and `rarity`; anything else automatically falls back to `name` before the query runs.