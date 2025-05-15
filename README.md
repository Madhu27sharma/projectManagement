Running the Project on Your System IP & Setting Up GeoIP
By default, Laravel serves applications at 127.0.0.1, which might not work when you want to access the app from another device on the same network. To serve your Laravel project using your system's IP address (IPv6 in this case), use the following command:

bash
Copy
Edit
php artisan serve --host="[2409:40d0:1331:ebb6:4d90:a828:4166:9e57]" --port=8000
🔁 Replace the IP above with your actual system IP if different. You can get it by running ipconfig (Windows) or ifconfig (Linux/macOS) in your terminal.

📍 GeoIP Setup (MaxMind Integration)
This project uses MaxMind GeoIP2 through the torann/geoip Laravel package to detect the user's geographical location (e.g., city and state) based on their IP address.

✅ Step-by-step Installation
Install Required Packages:

composer require torann/geoip
composer require geoip2/geoip2


Publish the Configuration File:

php artisan vendor:publish --provider="Torann\GeoIP\GeoIPServiceProvider" --tag=config
Set the Driver in .env:

Add the following line to your .env file to use the MaxMind database as the GeoIP driver:

GEOIP_DRIVER=maxmind_database

 Notes
Make sure the config/geoip.php file is created after publishing.(i have provided in mail)
By default, the MaxMind database is downloaded to storage/app/geoip.mmdb.

You may also need to run php artisan config:clear after updating .env to ensure settings are loaded correctly.

