<!DOCTYPE html>
<html>
    
<body>
    <h2>Gymnasium Admin Registration form</h2>
    <form action="" method="POST">
        <fieldset>
            <legend>Personal Information</legend>
            <label for="first_name">Full Name:</label>
            <input type="text" id="first_name" name="first_name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required><br><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required><br><br>

            <label>Gender:</label>
            <input type="radio" id="male" name="gender" value="Male" required>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female" required>
            <label for="female">Female</label><br><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea><br><br>
        </fieldset>

        <fieldset>
            <legend>Education</legend>
            <label for="options">Highest Degree:</label>
            <select id="options" name="options">
                <option value="HSC">HSC</option>
                <option value="HONOURS">HONOURS</option>
                <option value="MSC">MSC</option>
            </select><br><br>

            <label for="institution">Institution:</label>
            <input type="text" id="institution" name="institution" placeholder="University Name" required><br><br>

            <label for="year_o_g">Year Of Graduation:</label>
            <input type="text" id="year_o_g" name="year_o_g" required><br><br>
        </fieldset>

        <fieldset>
            <legend>Work Experience</legend>
            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="company_name" placeholder="Company Name" required><br><br>

            <label for="job_title">Job Title:</label>
            <input type="text" id="job_title" name="job_title" placeholder="Job Title" required><br><br>

            <label for="start_date">Duration:</label>
            <input type="date" id="start_date" name="start_date"> to 
            <input type="date" id="end_date" name="end_date"><br><br>
        </fieldset>

        <fieldset>
            <legend>Skills</legend>
            <label for="html">HTML</label>
            <input type="checkbox" id="html" name="skills[]" value="HTML">
            <label for="css">CSS</label>
            <input type="checkbox" id="css" name="skills[]" value="CSS">
            <label for="js">JavaScript</label>
            <input type="checkbox" id="js" name="skills[]" value="JS"><br><br>
        </fieldset>

        <button type="submit">Submit Resume</button>
    </form>
</body>

</html>
