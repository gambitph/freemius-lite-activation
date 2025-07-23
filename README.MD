# Freemius Lite Activation

This replaces the full Freemius WordPress SDK with a lite implementation for your premium WordPress plugin. This script allows only the following functions to work:

1. License key activation/deactivation
2. Plugin updates

This script already adds a license activation link in your plugin's area in the Admin Plugins page where users can add or remove their license key.

This script also provides minimal PHP functions for checking whether a license key is currently activated or not.

# Set up

1. Copy all of the files into your own plugin.
2. Require the `freemius.php` file in your own code.
3. Edit `freemius.php` and fill it up with your product details.

To prevent unwanted function and class naming conflicts, go through the code and rename the following:

1. The `fla_f` function name
2. The `FLA_Freemius` class name

# Why this is better than using the full Freemius SDK?

The full Freemius SDK is quite heavy on the server, especially if you just need to license key activation and plugin updates.

# Caveats

Since this is not the full implementation of the Freemius SDK, you will have to implement in your website the following:

1. Freemius plan checkout links - so users can purchase your product
2. Customer portal in your store - so users can manage their licenses

Since this is a simpler approach to doing things (more like how EDD does things), then users will have to do their own site management especially when it comes to development or staging sites.

# How it works

This script uses the much lighter (Freemius PHP SDK)[https://github.com/Freemius/freemius-php-sdk] and the proof of concept (Freemius SDK Lite)[https://github.com/Freemius/wp-sdk-lite] to use just the essential functions for license key activation/deactivation and plugin updates.

The `freemius` directory is needed in order to trick Freemius' parser into thinking that the Freemius SDK is present during deployment.

# Checking if plugin is activated

The script provides a few PHP functions that you can use to determine the activation status of your plugin.

## `is_plan( $plan, $matching = true )`

Check if the current license is for a specific plan.

```php
if ( fla_f()->is_plan( 'professional' ) ) {
    // Do only if the professional plan is active.
}
```

## `can_use_premium_code()`

Similar to Freemius's can_use_premium_code function, returns true if there is a valid license key active.

```php
if ( fla_f()->can_use_premium_code() ) {
    // Do only if there is a valid license key activated
}
```

## `is__premium_only()`

Similar to Freemius's is__premium_only function, returns true if there is a valid license key active.

```php
if ( fla_f()->is__premium_only() ) {
    // Do only if there is a valid license key activated
}
```

# Developing