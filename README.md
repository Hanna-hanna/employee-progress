## Employee Goals Progress

<div>
    <p>Clone project</p>
    <pre>git clone https://github.com/Hanna-hanna/employee-progress.git</pre>
    <pre>cd employee-progress</pre>
    <p>Install Requirements</p>
    <pre>composer install</pre>
    <pre>npm install</pre>
    <p>Create new database on the local database tool like TablePlus</p>
    <p>Create file .env from env.example (on the root) and add info</p>
    <pre>
    DB_DATABASE=name_your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    </pre>
    <p>Migrate Database</p>
    <pre>php artisan migrate --seed</pre>
    <p>Set key for application</p>
    <pre>php artisan key:generate</pre>
    <p>Start project from your server or use local</p>
    <pre>php artisan serve</pre>
    <p>Use this link in Postman to see API (method POST, data for body)</p>
    <pre>
    {
        "employee_id": 8,
        "goal_id": 10,
        "progress": 10
    }
    </pre>
    <pre>localhost:8000/api/employee-goals</pre>
</div>
