<body>
    <h1>Teacher's Portal</h1>
    <div class="container">
        <p>This project is a web application developed using Laravel. It includes various functionalities for user authentication and student management.</p>
        <h2>Technologies Used</h2>
        <ul>
            <li><strong>Frontend:</strong> HTML, CSS, Vanilla JavaScript, Tailwind CSS</li>
            <li><strong>Backend:</strong> PHP, MySQL, XAMPP</li>
        </ul>
        <h2>Features</h2>
        <ul>
            <li><strong>Login:</strong> Secure login functionality.</li>
            <li><strong>Register:</strong> User registration functionality.</li>
            <li><strong>Forgot Password:</strong> Password reset feature.</li>
            <li><strong>Logout:</strong> Logout functionality.</li>
            <li><strong>Student Management:</strong>
                <ul>
                    <li>Student Listing Pages</li>
                    <li>Student Edit Popup</li>
                    <li>Student Add Popup</li>
                    <li>Student Delete</li>
                </ul>
            </li>
        </ul>
        <h2>Controller and Model</h2>
        <ul>
            <li><strong>TeacherController:</strong> Resource controller for CRUD operations.</li>
            <li><strong>Teacher Model:</strong> Eloquent model for interacting with the `teachers` table.</li>
        </ul>
    <h2>Local Installation</h2>
    <ol>
        <li>
            <strong>Clone the Repository:</strong>
            <pre><code>git clone [https://github.com/yourusername/teacher-portal.git](https://github.com/GowthamSelvaraj123/TeacherPortal.git)
cd teacher-portal</code></pre>
        </li>
        <li>
            <strong>Install Dependencies:</strong>
            <ul>
                <li><strong>For PHP/Laravel:</strong>
                    <pre><code>composer install</code></pre>
                </li>
            </ul>
        </li>
        <li>
            <strong>Set Up Environment:</strong>
            <ul>
                <li>Copy the <code>.env.example</code> file to <code>.env</code>:
                    <pre><code>cp .env.example .env</code></pre>
                </li>
                <li>Update the <code>.env</code> file with your MySQL details:
                    <pre><code>DB_CONNECTION=mysql
                        DB_HOST=127.0.0.1
                        DB_PORT=3306
                        DB_DATABASE=your_database_name
                        DB_USERNAME=your_database_username
                        DB_PASSWORD=your_database_password</code></pre>
                </li>
            </ul>
        </li>
        <li>
            <strong>Generate Application Key:</strong>
            <pre><code>php artisan key:generate</code></pre>
        </li>
        <li>
            <strong>Run Migrations:</strong>
            <pre><code>php artisan migrate</code></pre>
        </li>
        <li>
            <strong>Start the Development Server:</strong>
            <ul>
                <li><strong>For Laravel:</strong>
                    <pre><code>php artisan serve</code></pre>
                </li>
                <li><strong>For Node.js (if applicable):</strong>
                    <pre><code>npm start</code></pre>
                </li>
            </ul>
        </li>
        <li>
            <strong>Access the Application:</strong>
            <p>Open your browser and go to <code>http://127.0.0.1:8000/</code> (or the port specified by your server).</p>
        </li>
    </ol>
    <h2>Contributing</h2>
    <p>Feel free to submit issues or pull requests.</p>
    <h2>License</h2>
    <p>This project is licensed under the MIT License.</p>
</body>
