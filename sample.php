<!DOCTYPE html>
<html>

<head>
    <title>Student Enrollment Form</title>
    <link rel="stylesheet" href="style.css"> </head>

    <style>body {
    font-family: 'Arial', sans-serif; 
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.container {
    width: 21cm; /* Adjust as needed to match PDF width */
    margin: 20px auto;
    padding: 20px;
    /* border: 1px solid #ccc; */
}

.header {
    text-align: center;
    margin-bottom: 20px;
}

.header h2 {
    margin: 0;
}

.body {

}

.section {
    margin-bottom: 20px;
}

.form-row {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.form-row label {
    width: 30%; /* Adjust as needed */
    margin-right: 10px;
}

.form-row input[type="text"],
.form-row input[type="date"],
.form-row input[type="tel"],
.form-row input[type="number"] {
    flex-grow: 1;
    padding: 5px;
    border: 0px;
    border-bottom: 2px solid #ccc;
}

.checkbox-group {
    display: flex;
    align-items: center;
}

.checkbox-group label {
    margin-right: 20px;
    width: auto; /* Reset width for checkboxes */
}
    </style>
<body>
    <div class="container">
        <div class="header">
            <h2>Little Javanna Montessori Academy</h2>
            <p>2 J Capitol Ville, Brgy. Gatid, Sta.Cruz, Laguna<br> (049) 501-5925 / 09175257160 / 09175257249</p>
        </div>

        <div class="body">
            <div class="section">
                <p>Academic Year: <input type="text" size="4"> to <input type="text" size="4"></p>
                <div class="checkbox-group">
                    <label><input type="radio" name="lrn" value="noLRN"> No LRN</label>
                    <label><input type="radio" name="lrn" value="withLRN"> With LRN</label>
                    <label><input type="radio" name="lrn" value="returning"> Returning (Balik-Aral)</label>
                </div>
            </div>

            <h3>STUDENT INFORMATION</h3>
            <div class="section">
                <div class="form-row">
                    <label for="psaBirthCertNo">PSA Birth Certificate NO.</label>
                    <input type="text" id="psaBirthCertNo">
                </div>
                <div class="form-row">
                    <label for="lrn">Learner Reference No. (LRN):</label>
                    <input type="text" id="lrn">
                </div>
                <div class="form-row">
                    <label for="lastName">LAST NAME:</label>
                    <input type="text" id="lastName">
                </div>
                <div class="form-row">
                    <label for="firstName">FIRST NAME:</label>
                    <input type="text" id="firstName">
                </div>
                <div class="form-row">
                    <label for="middleName">MIDDLE NAME:</label>
                    <input type="text" id="middleName">
                </div>
                <div class="form-row">
                    <label for="extensionName">Extension Name. eg. Jr., III (if applicable):</label>
                    <input type="text" id="extensionName">
                </div>
                <div class="form-row">
                    <label for="dateOfBirth">DATE OF BIRTH:</label>
                    <input type="date" id="dateOfBirth">
                    <label for="sex">SEX:</label>
                    <input type="text" id="sex" size="1">
                    <label for="age">AGE:</label>
                    <input type="number" id="age" size="2">
                </div>
                <div class="form-row">
                    <p>Belonging to any indigenous People (IP) Community/ Indigenous cultural community?</p>
                    <div class="checkbox-group">
                        <label><input type="radio" name="ip" value="no"> NO</label>
                        <label><input type="radio" name="ip" value="yes"> YES</label>
                    </div>
                    <label for="ipSpecify">If Yes, please specify:</label>
                    <input type="text" id="ipSpecify">
                </div>
                <div class="form-row">
                    <label for="motherTongue">Mother Tongue</label>
                    <input type="text" id="motherTongue">
                </div>
            </div>

            <h3>ADDRESS</h3>
            <div class="section">
                <div class="form-row">
                    <label for="homeAddress">Home Number and Street</label>
                    <input type="text" id="homeAddress">
                </div>
            </div>

            <h3>PARENT’S/GUARDIAN INFORMATION</h3>
            <div class="section">
                <div class="form-row">
                    <label for="cellphoneNo">Cellphone No.</label>
                    <input type="tel" id="cellphoneNo">
                </div>
                <div class="form-row">
                    <label>Father’s Name:</label>
                    <div class="name-inputs">
                        <input type="text" placeholder="Last Name">
                        <input type="text" placeholder="First Name">
                        <input type="text" placeholder="Middle Name">
                    </div>
                </div>
                <div class="form-row">
                    <label>Mother’s Name:</label>
                    <div class="name-inputs">
                        <input type="text" placeholder="Last Name">
                        <input type="text" placeholder="First Name">
                        <input type="text" placeholder="Middle Name">
                    </div>
                </div>
                <div class="form-row">
                    <label>Guardian’s Name:</label>
                    <div class="name-inputs">
                        <input type="text" placeholder="Last Name">
                        <input type="text" placeholder="First Name">
                        <input type="text" placeholder="Middle Name">
                    </div>
                </div>
            </div>

            <h3>For Returning Learners (Balik-Aral) and those Who shall Transfer/ Move In</h3>
            <div class="section">
                <div class="form-row">
                    <label for="lastGradeLevel">Last Grade Level completed</label>
                    <input type="text" id="lastGradeLevel" size="2">
                    <label for="lastSchoolYear">Last School Year Completed</label>
                    <input type="text" id="lastSchoolYear" size="4">
                </div>
                <div class="form-row">
                    <label for="schoolName">School Name:</label>
                    <input type="text" id="schoolName">
                    <label for="schoolId">School ID No.</label>
                    <input type="text" id="schoolId">
                </div>
                <div class="form-row">
                    <label for="schoolAddress">School Address:</label>
                    <input type="text" id="schoolAddress">
                </div>
                <div class="form-row">
                    <label for="contactPerson">Contact Person & Number from Previous School:</label>
                    <input type="text" id="contactPerson">
                </div>
            </div>

            <p>I hereby certify that the above information given are true and correct to the best of my knowledge.</p>
            <div class="signature">
                <p>___________________________<br> Parent/ Guardian Signature Over Printed Name</p>
            </div>
        </div>

        <div class="print-button">
            <button onclick="window.print()">Print Form</button>
        </div>
    </div>
</body>

</html>