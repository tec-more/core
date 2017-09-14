# Tuke default theme - Triangle

### How to use
- Install Tuke
- Download these plugins: `contact-form` and `captcha` from [github.com/tuke-plugins](https://github.com/tuke-plugins)
- Overwrite the `composer.json` of Tuke by the file `composer.sjon` in `sample-data` folder.
- Overwrite the database by the file in `sample-data/tuke_triangle_theme.sql`.
- Run
```$xslt
php artisan vendor:publish --tag=tuke-public-assets --force
```
- Enjoy~