# Lab Activity 6 - Query String Filters

## Q1: You added a second filter without adding a single route. Explain why no new route was needed.
No new route was needed because Laravel's router evaluates only the scheme, host, and path portion of a URL (e.g., `/books`). Query strings appended to the end (starting with `?`) are ignored by the router when matching route definitions. As a result, one single route handles `/books`, `/books?genre=Design`, `/books?year=2024`, and `/books?genre=Design&year=2024`, with parameter reading handled inside the controller via `$request->query()`.

## Q2: Suppose you had built both filters as route parameters instead. Describe what the URL for 'year 4 only, no course filter' would have to look like, and why.
If both filters were designed as positional route parameters (e.g., `/books/{genre}/{year}`), filtering by year alone without a genre filter would require a placeholder segment in the URL, such as `/books/all/2024` or `/books/none/2024`. This happens because route parameters depend strictly on segment position. The router cannot skip the first parameter segment to reach the second, whereas query strings permit key-value pairs in any order.

## Q3: Your navigation link stays marked on a detail page and also when a filter is applied. Only one of those two needed a change to your pattern. Say which one, and why the other needed nothing.
Only the detail page required a pattern change (`books*` wildcard instead of exact `books`). The detail page changes the URL path structure to `/books/1`, which fails an exact path check. Query strings, on the other hand, retain the exact underlying path `/books`, so filtered pages match standard path checks without requiring pattern updates.

## Q4: You deleted your old filter method but kept the empty store and update methods, even though none of the three can be reached by a URL. Explain the difference between them.
The old filter method and its associated view were deleted because query-string filtering completely replaced that feature, making the old code dead and redundant. Conversely, the empty `store` and `update` methods are structural placeholders reserved for upcoming CRUD lab modules. Retaining empty controller stubs tracks incomplete work, whereas keeping obsolete methods creates duplicate code paths.