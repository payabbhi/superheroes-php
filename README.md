# Superheroes - A tutorial to enable Payments acceptance via Payabbhi PHP library

Superheroes Store allows purchase of a superhero, to run errands for you, by paying a random amount between ₹1 to ₹5.

The `Payments Acceptance workflow` is implemented as described in the Payabbhi [Integration Guide](https://payabbhi.com/docs/integration) using [Payabbhi PHP Library](https://github.com/payabbhi/payabbhi-php).

This tutorial demonstrates integration with `Payabbhi Checkout` using both [dropin](https://payabbhi.com/docs/checkout/#drop-in-checkout) and [custom](https://payabbhi.com/docs/checkout/#custom-checkout) modes.

The Superheroes tutorial is designed to take you to full implementation in four graded steps:

- Step 1 : Basic implementation of `Payments Acceptance workflow`
- Step 2 : Add `Payment Response Handling`
- Step 3 : Add `Exception Handling`
- Step 4 : Reorganize and Refactor to bring everything together


## Getting started

* Clone the Superheroes repository
* Install the `Payabbhi PHP Client library`
* Sign up for a `Payabbhi account` and download `API Keys`
* Setup the local env for running Superheroes

### Clone the Superheroes repository

```
 $ git clone https://github.com/payabbhi/superheroes-php.git
```

### Install the Payabbhi PHP Client library

To run any of the steps, you will first need to install the [Payabbhi PHP library](https://github.com/payabbhi/payabbhi-php). To do so follow the [installation steps](https://github.com/payabbhi/payabbhi-php/blob/master/README.md).

Assumptions for this tutorial:
* `Payabbhi PHP Library` is installed via `Composer`.
* The library is installed in the `superheroes-php\public` folder.

### Sign up for a Payabbhi account and download API Keys

Next, sign up for a [Payabbhi Account](https://payabbhi.com/docs/account) and download the [API keys](https://payabbhi.com/docs/account/#api-keys) from the [Portal](https://payabbhi.com/portal).

As you go through the tutorial, you will need to replace every instance of `<ACCESS-ID>` and `<SECRET-KEY>` with your actual keys. You would typically want to use your `test mode API` keys for this tutorial.

### Setup the local env for running Superheroes

For the purposes of this tutorial, the `public` folder (included in the git repo) is assumed to be the web root directory. You'll need to configure your web server accordingly, or clone the repo in the right directory to ensure that.

For each step in the tutorial, first copy the script(s) to be executed to the `public` folder and then open index.php in your browser.
