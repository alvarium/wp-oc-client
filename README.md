# wp-oc-client

Wordpress plugin to include OpenComponents in your site

## Setting up server rendering

This plugin need to has configured where is open-components server. You can got to your wordpress backoffice under
Options -> WC oc-client and set your server URL.

## Using plugin shortags

You can include components in any page using shortcodes. You can include your own one like this:

```html
[oc-component component="name-of-component" parameter1="value1" parameter_camel="This one will be translated to parameterCamel when passed to component" parameter-level1-level2="This one will be translated to parameter.level1.level2 when passed to component"]]
```
