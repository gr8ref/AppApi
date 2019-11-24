<h2><a id="user-content-laravel-configuration" class="anchor" aria-hidden="true" href="#laravel-configuration"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Laravel configuration:</h2>
<div class="highlight highlight-source-shell"><pre>$ <span class="pl-c1">cd</span> web
$ composer install</pre></div>
<p>Then rename the <strong>.env.example</strong> file to <strong>.env</strong>, open it and add your database name, your username and password, then run these commands to generate the key, create tables and insert some data:</p>
<div class="highlight highlight-source-shell"><pre>$ php artisan key:generate
$ php artisan migrate --seed</pre></div>
<p>Then serve your project with this flag to let any device from your local network to access your project.</p>
<div class="highlight highlight-source-shell"><pre>$ php artisan serve --host=0.0.0.0</pre></div>