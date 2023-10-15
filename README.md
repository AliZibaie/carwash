## installation
<ol>
<li>create .env from .env.example</li>
<li>composer install --ignore-platform-req=ext-http</li>
<li>npm install</li>
<li>npm run dev</li>
<li>wsl</li>
<li>sail up -d ( if you got an error run this : ./vendor/bin/sail up -d )</li>
<li>php artisan migrate:fresh --seed</li>
<li>php artisan key:generate </li>
<li>php artisan serve</li>
</ol>
