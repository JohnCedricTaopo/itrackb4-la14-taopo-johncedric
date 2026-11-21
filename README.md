## Lab Activity 14 Answers

### F1. Authentication and authorisation are not the same. What did this lesson give you, and what is still missing?

This lesson gave my Genshin Impact archive authentication, so the application can identify a registered user through registration, login and logout. Authorisation is still missing because every signed-in account can currently perform the protected character actions; the next lesson will decide what each account is allowed to do.

### F2. Why does a successful login call session()->regenerate()?

The session ID is regenerated after a successful login to prevent session fixation. If it is skipped, someone who already knew the old session ID could possibly continue using that ID after the account became signed in.

### F3. Why is the failed-login message the same for a wrong password and an unknown email?

The same generic message prevents a stranger from discovering which email addresses are registered in my application. It gives the real user enough information to try again without revealing account information.

### F4. Why are index and show public while the other five actions use auth?

The character list and detail pages are meant for visitors to browse the Genshin Impact archive, so `index` and `show` remain public. Creating, editing, updating and deleting change the database, so those five actions require a signed-in user.

### F5. Why is hiding Add and the actions not enough to secure them?

A visitor can still type the create or edit URL directly even when the button is hidden. The `auth` middleware on the five changing resource actions is what actually stops a guest from reaching those actions.

### F6. Why must the login route be named exactly login?

Laravel’s `auth` middleware sends an unauthenticated visitor to the route named `login`. If I rename it to `signin`, the middleware cannot find the expected route and produces a route-not-defined error.