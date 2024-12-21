// Default quiz data
    const defaultQuiz = {
        questions: [
            { 
                text: "The Probationary Driving License (PDL) CANNOT be converted to a Competent Driving License (CDL) after exceeding a period of:", 
                options: ["3 years", "2 years", "1 year"], 
                correctAnswerIndex: 0 
            },
            { 
                text: "The Competent Driving License (CDL) CANNOT be renewed after exceeding a period of:", 
                options: ["3 years", "2 years", "1 year"], 
                correctAnswerIndex: 0 
            },
            { 
                text: "What is the minimum age requirement to apply for a Class B driving license?", 
                options: ["16 years old", "17 years old", "18 years old"], 
                correctAnswerIndex: 0 
            },
            { 
                text: "What rule must be followed by a Learner’s Driving License (LDL) holder while riding?", 
                options: ["Carrying an identification card.", "Displaying the 'L' plate.", "Carrying passengers."], 
                correctAnswerIndex: 0 
            },
            { 
                text: "What class of license is required for riding motorcycles?", 
                options: ["Class B", "Class D", "Class E"], 
                correctAnswerIndex: 0 
            },
            { 
                text: "What does the KEJARA system stand for?", 
                options: ["Road Skill System", "Road Education System", "Road Safety System"], 
                correctAnswerIndex: 0 
            },
            { 
                text: "Which of the following is considered a scheduled offense in the KEJARA system?", 
                options: ["Driving above the speed limit.", "Driving an unregistered vehicle.", "Driving a vehicle without insurance coverage."], 
                correctAnswerIndex: 0 
            },
            { 
                text: "Under the KEJARA system, which offense can cause a Probationary Driving License (PDL) to be revoked?", 
                options: ["Using bald tires.", "Failing to obey traffic lights.", "Overtaking on a double line."], 
                correctAnswerIndex: 0 
            },
            { 
                text: "If you want to ride a motorcycle with an engine capacity exceeding 500 cc, which class of license do you need?", 
                options: ["Class B", "Class B2", "Class D"], 
                correctAnswerIndex: 0 
            },
            { 
                text: "The requirement for motorcycle passengers riding with a Learner’s Driving License (LDL) holder is:", 
                options: ["Displaying the 'L' plate on the left and right sides of the motorcycle.", "Displaying the 'P' plate at the front and rear of the motorcycle.", " Displaying the 'L' plate at the front and rear of the motorcycle."],
                correctAnswerIndex: 0
            }
        ]
    };

    // Load quiz from localStorage or fallback to default
    let quizData = JSON.parse(localStorage.getItem('quizData')) || defaultQuiz;

    // Populate fields
    document.getElementById('q1Text').value = quizData.questions[0].text;
    document.getElementById('q1o1').value = quizData.questions[0].options[0];
    document.getElementById('q1o2').value = quizData.questions[0].options[1];
    document.getElementById('q1o3').value = quizData.questions[0].options[2];
    document.getElementById('q1Correct').value = quizData.questions[0].correctAnswerIndex.toString();

    document.getElementById('q2Text').value = quizData.questions[1].text;
    document.getElementById('q2o1').value = quizData.questions[1].options[0];
    document.getElementById('q2o2').value = quizData.questions[1].options[1];
    document.getElementById('q2o3').value = quizData.questions[1].options[2];
    document.getElementById('q2Correct').value = quizData.questions[1].correctAnswerIndex.toString();

    document.getElementById('q3Text').value = quizData.questions[2].text;
    document.getElementById('q3o1').value = quizData.questions[2].options[0];
    document.getElementById('q3o2').value = quizData.questions[2].options[1];
    document.getElementById('q3o3').value = quizData.questions[2].options[2];
    document.getElementById('q3Correct').value = quizData.questions[2].correctAnswerIndex.toString();

    document.getElementById('q4Text').value = quizData.questions[3].text;
    document.getElementById('q4o1').value = quizData.questions[3].options[0];
    document.getElementById('q4o2').value = quizData.questions[3].options[1];
    document.getElementById('q4o3').value = quizData.questions[3].options[2];
    document.getElementById('q4Correct').value = quizData.questions[3].correctAnswerIndex.toString();

    document.getElementById('q5Text').value = quizData.questions[4].text;
    document.getElementById('q5o1').value = quizData.questions[4].options[0];
    document.getElementById('q5o2').value = quizData.questions[4].options[1];
    document.getElementById('q5o3').value = quizData.questions[4].options[2];
    document.getElementById('q5Correct').value = quizData.questions[4].correctAnswerIndex.toString();

    document.getElementById('q6Text').value = quizData.questions[5].text;
    document.getElementById('q6o1').value = quizData.questions[5].options[0];
    document.getElementById('q6o2').value = quizData.questions[5].options[1];
    document.getElementById('q6o3').value = quizData.questions[5].options[2];
    document.getElementById('q6Correct').value = quizData.questions[5].correctAnswerIndex.toString();

    document.getElementById('q7Text').value = quizData.questions[6].text;
    document.getElementById('q7o1').value = quizData.questions[6].options[0];
    document.getElementById('q7o2').value = quizData.questions[6].options[1];
    document.getElementById('q7o3').value = quizData.questions[6].options[2];
    document.getElementById('q7Correct').value = quizData.questions[6].correctAnswerIndex.toString();

    document.getElementById('q8Text').value = quizData.questions[7].text;
    document.getElementById('q8o1').value = quizData.questions[7].options[0];
    document.getElementById('q8o2').value = quizData.questions[7].options[1];
    document.getElementById('q8o3').value = quizData.questions[7].options[2];
    document.getElementById('q8Correct').value = quizData.questions[7].correctAnswerIndex.toString();

    document.getElementById('q9Text').value = quizData.questions[8].text;
    document.getElementById('q9o1').value = quizData.questions[8].options[0];
    document.getElementById('q9o2').value = quizData.questions[8].options[1];
    document.getElementById('q9o3').value = quizData.questions[8].options[2];
    document.getElementById('q9Correct').value = quizData.questions[8].correctAnswerIndex.toString();

    document.getElementById('q10Text').value = quizData.questions[9].text;
    document.getElementById('q10o1').value = quizData.questions[9].options[0];
    document.getElementById('q10o2').value = quizData.questions[9].options[1];
    document.getElementById('q10o3').value = quizData.questions[9].options[2];
    document.getElementById('q10Correct').value = quizData.questions[9].correctAnswerIndex.toString();

    const saveBtn = document.getElementById('saveBtn');
    const resetBtn = document.getElementById('resetBtn');
    const errorMsg = document.getElementById('errorMsg');

    saveBtn.addEventListener('click', function() {
        // Gather values
        const q1Text = document.getElementById('q1Text').value.trim();
        const q1o1 = document.getElementById('q1o1').value.trim();
        const q1o2 = document.getElementById('q1o2').value.trim();
        const q1o3 = document.getElementById('q1o3').value.trim();
        const q1Correct = document.getElementById('q1Correct').value;

        const q2Text = document.getElementById('q2Text').value.trim();
        const q2o1 = document.getElementById('q2o1').value.trim();
        const q2o2 = document.getElementById('q2o2').value.trim();
        const q2o3 = document.getElementById('q2o3').value.trim();
        const q2Correct = document.getElementById('q2Correct').value;

        const q3Text = document.getElementById('q3Text').value.trim();
        const q3o1 = document.getElementById('q3o1').value.trim();
        const q3o2 = document.getElementById('q3o2').value.trim();
        const q3o3 = document.getElementById('q3o3').value.trim();
        const q3Correct = document.getElementById('q3Correct').value;

        const q4Text = document.getElementById('q4Text').value.trim();
        const q4o1 = document.getElementById('q4o1').value.trim();
        const q4o2 = document.getElementById('q4o2').value.trim();
        const q4o3 = document.getElementById('q4o3').value.trim();
        const q4Correct = document.getElementById('q4Correct').value;

        const q5Text = document.getElementById('q5Text').value.trim();
        const q5o1 = document.getElementById('q5o1').value.trim();
        const q5o2 = document.getElementById('q5o2').value.trim();
        const q5o3 = document.getElementById('q5o3').value.trim();
        const q5Correct = document.getElementById('q5Correct').value;

        const q6Text = document.getElementById('q6Text').value.trim();
        const q6o1 = document.getElementById('q6o1').value.trim();
        const q6o2 = document.getElementById('q6o2').value.trim();
        const q6o3 = document.getElementById('q6o3').value.trim();
        const q6Correct = document.getElementById('q6Correct').value;

        const q7Text = document.getElementById('q7Text').value.trim();
        const q7o1 = document.getElementById('q7o1').value.trim();
        const q7o2 = document.getElementById('q7o2').value.trim();
        const q7o3 = document.getElementById('q7o3').value.trim();
        const q7Correct = document.getElementById('q7Correct').value;

        const q8Text = document.getElementById('q8Text').value.trim();
        const q8o1 = document.getElementById('q8o1').value.trim();
        const q8o2 = document.getElementById('q8o2').value.trim();
        const q8o3 = document.getElementById('q8o3').value.trim();
        const q8Correct = document.getElementById('q8Correct').value;

        const q9Text = document.getElementById('q9Text').value.trim();
        const q9o1 = document.getElementById('q9o1').value.trim();
        const q9o2 = document.getElementById('q9o2').value.trim();
        const q9o3 = document.getElementById('q9o3').value.trim();
        const q9Correct = document.getElementById('q9Correct').value;

        const q10Text = document.getElementById('q10Text').value.trim();
        const q10o1 = document.getElementById('q10o1').value.trim();
        const q10o2 = document.getElementById('q10o2').value.trim();
        const q10o3 = document.getElementById('q10o3').value.trim();
        const q10Correct = document.getElementById('q10Correct').value;


        // Validate
        if (!q1Text || !q1o1 || !q1o2 || !q1o3 || q1Correct === "" ||
            !q2Text || !q2o1 || !q2o2 || !q2o3 || q2Correct === "" ||
            !q3Text || !q3o1 || !q3o2 || !q3o3 || q3Correct === "" ||
            !q4Text || !q4o1 || !q4o2 || !q4o3 || q4Correct === "" ||
            !q5Text || !q5o1 || !q5o2 || !q5o3 || q5Correct === "" ||
            !q6Text || !q6o1 || !q6o2 || !q6o3 || q6Correct === "" ||
            !q7Text || !q7o1 || !q7o2 || !q7o3 || q7Correct === "" ||
            !q8Text || !q8o1 || !q8o2 || !q8o3 || q8Correct === "" ||
            !q9Text || !q9o1 || !q9o2 || !q9o3 || q9Correct === "" ||
            !q10Text || !q10o1 || !q10o2 || !q10o3 || q10Correct === "") {
            errorMsg.style.display = 'block';
        } else {
            errorMsg.style.display = 'none';
            const updatedQuiz = {
                questions: [
                    { text: q1Text, options: [q1o1, q1o2, q1o3], correctAnswerIndex: parseInt(q1Correct,10) },
                    { text: q2Text, options: [q2o1, q2o2, q2o3], correctAnswerIndex: parseInt(q2Correct,10) },
                    { text: q3Text, options: [q3o1, q3o2, q3o3], correctAnswerIndex: parseInt(q3Correct,10) },
                    { text: q4Text, options: [q4o1, q4o2, q4o3], correctAnswerIndex: parseInt(q4Correct,10) },
                    { text: q5Text, options: [q5o1, q5o2, q5o3], correctAnswerIndex: parseInt(q5Correct,10) },
                    { text: q6Text, options: [q6o1, q6o2, q6o3], correctAnswerIndex: parseInt(q6Correct,10) },
                    { text: q7Text, options: [q7o1, q7o2, q7o3], correctAnswerIndex: parseInt(q7Correct,10) },
                    { text: q8Text, options: [q8o1, q8o2, q8o3], correctAnswerIndex: parseInt(q8Correct,10) },
                    { text: q9Text, options: [q9o1, q9o2, q9o3], correctAnswerIndex: parseInt(q9Correct,10) },
                    { text: q10Text, options: [q10o1, q10o2, q10o3], correctAnswerIndex: parseInt(q10Correct,10) },
                ]
            };
            localStorage.setItem('quizData', JSON.stringify(updatedQuiz));
            alert("Quiz updated successfully!");
        }
    });

    resetBtn.addEventListener('click', function() {
        localStorage.removeItem('quizData');
        location.reload();
    });
