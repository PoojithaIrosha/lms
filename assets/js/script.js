// Student Forgot Password Modal
document.getElementById("stdForgotPassword").addEventListener("click", () => {
    var forgotPasswordModal = new bootstrap.Modal(
        document.getElementById("stdForgotPasswordModal")
    );
    forgotPasswordModal.show();
});

// Admin Forgot Password Modal
document.getElementById("adminForgotPassword").addEventListener("click", () => {
    var forgotPasswordModal = new bootstrap.Modal(
        document.getElementById("adminForgotPasswordModal")
    );
    forgotPasswordModal.show();
});

// Student Sign In
document.getElementById("stdSignInBtn").addEventListener("click", () => {
    var email = document.getElementById("stdEmail");
    var password = document.getElementById("stdPassword");
    var rememberMe = document.getElementById("stdRememberMe");

    var form = new FormData();
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("rememberMe", rememberMe.checked);

    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                window.location = "studentHome.php";
            } else {
                document.getElementById("errorDiv").classList.remove("d-none");
                document.getElementById("errMsg").innerHTML = text;
            }
        }
    };
    request.open("POST", "processes/studentSignInProcess.php", true);
    request.send(form);
});

// Admin Sign In
document.getElementById("adminSignInBtn").addEventListener("click", () => {
    var email = document.getElementById("adminEmail");
    var password = document.getElementById("adminPassword");
    var rememberMe = document.getElementById("adminRememberMe");

    var form = new FormData();
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("rememberMe", rememberMe.checked);

    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                console.log("success");
                window.location = "adminHome.php";
            } else {
                document.getElementById("errorDiv").classList.remove("d-none");
                document.getElementById("errMsg").innerHTML = text;
            }
        }
    };
    request.open("POST", "processes/adminLoginProcess.php", true);
    request.send(form);
});

// Close Error Dialogue Box
function closeMsg() {
    document.getElementById("errorDiv").classList.add("d-none");
}

// Show Password
function showPassword(id) {
    if (document.getElementById(id).type == "text") {
        document.getElementById(id).type = "password";
    } else {
        document.getElementById(id).type = "text";
    }
}

// Change View between Admin & Student
function changeView() {
    var stdForm = document.getElementById("stdFormDiv");
    var adminForm = document.getElementById("adminFormDiv");
    var title = document.getElementById("title");
    var changeViewBtn = document.getElementById("changeViewBtn");

    stdForm.classList.toggle("d-none");
    adminForm.classList.toggle("d-none");

    if (title.innerHTML == "Student Login") {
        title.innerHTML = "Admin Login";
        changeViewBtn.innerHTML = "Student Login";
    } else {
        title.innerHTML = "Student Login";
        changeViewBtn.innerHTML = "Admin Login";
    }

    closeMsg();

}

// Send Student Verification Code
document.getElementById("stdFpSendCodeBtn").addEventListener("click", () => {
    var stdFpEmail = document.getElementById("stdFpEmail");

    var form = new FormData();
    form.append("email", stdFpEmail.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            alert(text);
        }
    };
    request.open("POST", "processes/sendCode.php", true);
    request.send(form);
});

// Send Admin Verification Code
document.getElementById("adminFpSendCodeBtn").addEventListener("click", () => {
    var adminFpEmail = document.getElementById("adminFpEmail");

    var form = new FormData();
    form.append("email", adminFpEmail.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            alert(text);
        }
    };
    request.open("POST", "processes/sendCode.php", true);
    request.send(form);
});

// Student Password Reset Process
document.getElementById("stdFpResetPassword").addEventListener("click", () => {
    var email = document.getElementById("stdFpEmail");
    var password1 = document.getElementById("stdFpPassword");
    var password2 = document.getElementById("stdFpVerifyPassword");
    var verificationCode = document.getElementById("stdFpVerificationCode");

    var form = new FormData();
    form.append("email", email.value);
    form.append("password1", password1.value);
    form.append("password2", password2.value);
    form.append("verificationcode", verificationCode.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            alert(text);
        }
    };
    request.open("POST", "processes/resetStudentPassword.php", true);
    request.send(form);
});

// Admin Password Reset Process
document.getElementById("fpResetPassword").addEventListener("click", () => {
    var email = document.getElementById("adminFpEmail");
    var password1 = document.getElementById("adminFpPassword");
    var verifyPassword = document.getElementById("adminFpVerifyPassword");
    var verificationCode = document.getElementById("adminFpVerificationCode");

    var form = new FormData();
    form.append("email", email.value);
    form.append("password1", password1.value);
    form.append("verifypassword", verifyPassword.value);
    form.append("verificationcode", verificationCode.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            alert(text);
        }
    };
    request.open("POST", "processes/resetAdminPassword.php", true);
    request.send(form);
});

// Sign Out
function signOut() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                window.location = "index.php";
            } else {
                alert(text);
            }
        }
    };
    request.open("GET", "processes/signOutProcess.php", true);
    request.send();
}

// Update Student Profile
function updateStdProfile() {
    var c = confirm("Are You Sure You Want To Update The Profile?");
    if (c) {
        var stdFirstName = document.getElementById("stdFirstName");
        var stdLastName = document.getElementById("stdLastName");
        var stdMobile = document.getElementById("stdMobile");

        var form = new FormData();
        form.append("fname", stdFirstName.value);
        form.append("lname", stdLastName.value);
        form.append("mobile", stdMobile.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = () => {
            if (request.readyState == 4) {
                var text = request.responseText;
                if (text == "success") {
                    window.location = "studentHome.php";
                } else {
                    alert(text);
                }
            }
        };
        request.open("POST", "processes/updateStdProfile.php", true);
        request.send(form);
    }
}

// Update Admin Profile
function updateAdminProfile() {
    var c = confirm("Are You Sure You Want To Update The Profile?");
    if (c) {
        var adminEmail = document.getElementById("adminEmail");
        var adminFirstName = document.getElementById("adminFirstName");
        var adminLastName = document.getElementById("adminLastName");
        var adminMobile = document.getElementById("adminMobile");

        var form = new FormData();
        form.append("email", adminEmail.value);
        form.append("fname", adminFirstName.value);
        form.append("lname", adminLastName.value);
        form.append("mobile", adminMobile.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = () => {
            if (request.readyState == 4) {
                var text = request.responseText;
                if (text == "success") {
                    window.location = "adminHome.php";
                } else {
                    document.getElementById("errorDiv").classList.remove("d-none");
                    document.getElementById("errMsg").innerHTML = text;
                }
            }
        };
        request.open("POST", "processes/updateAdminProfile.php", true);
        request.send(form);
    }
}

// Change Student Password
function changeStdPassword() {
    var c = confirm("Are you sure?");
    if (c) {


        var currentpwd = document.getElementById("currentStdPwd");
        var newStdPwd = document.getElementById("newStdPwd");
        var verifyPwd = document.getElementById("verifyStdPwd");

        var form = new FormData();
        form.append("cpwd", currentpwd.value);
        form.append("npwd", newStdPwd.value);
        form.append("vnpwd", verifyPwd.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = () => {
            if (request.readyState == 4) {
                var text = request.responseText;
                if (text == "success") {
                    window.location = "studentHome.php";
                } else {
                    document.getElementById("errorDiv").classList.remove("d-none");
                    document.getElementById("errMsg").innerHTML = text;
                }
            }
        };
        request.open("POST", "processes/changeStdPassword.php", true);
        request.send(form);
    }
}

// Change Admin Password
function changeAdminPassword() {

    var c = confirm("Are you sure?");

    if (c) {
        var currentpwd = document.getElementById("currentAdminPwd");
        var newAdminPwd = document.getElementById("newAdminPwd");
        var verifyPwd = document.getElementById("verifyAdminPwd");

        var form = new FormData();
        form.append("cpwd", currentpwd.value);
        form.append("npwd", newAdminPwd.value);
        form.append("vnpwd", verifyPwd.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = () => {
            if (request.readyState == 4) {
                var text = request.responseText;
                if (text == "success") {
                    window.location = "adminHome.php";
                } else {
                    document.getElementById("errorDiv").classList.remove("d-none");
                    document.getElementById("errMsg").innerHTML = text;
                }
            }
        };
        request.open("POST", "processes/changeAdminPassword.php", true);
        request.send(form);
    }
}

// Show Payment Modal
function showPaymentModal() {
    var paymentModal = new bootstrap.Modal(document.getElementById("paymentModal"));
    paymentModal.show();
}

// Upload Payment Slip
function uploadPaymentSlip() {
    var c = confirm("Are you sure?");
    if (c) {
        var image = document.getElementById("slipUploader");

        var form = new FormData();
        form.append("img", image.files[0]);

        var request = new XMLHttpRequest();
        request.onreadystatechange = () => {
            var btn = document.getElementById("UploadBtn");
            if (request.readyState != 4) {
                var text = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="loadingBtn"></span>'
                btn.innerHTML = text;
            }
            if (request.readyState == 4) {
                btn.innerHTML = "Upload Success";
                var text = request.responseText;
                if (text == "success") {
                    alert("Payement Success! Please sign out and Login Again...");
                    window.location = "index.php";
                } else {
                    alert(text);
                }
            }
        }
        request.open("POST", "processes/uploadPaymentSlipProcess.php", true);
        request.send(form);
    }
}

// PayHere Intergration
function payHerePay() {
    var orderId = Math.floor((Math.random() * 10000) + 1);
    var paymentFname = document.getElementById("paymentFname").value;
    var paymentLname = document.getElementById("paymentLname").value;
    var paymentEmail = document.getElementById("paymentEmail").value;
    var paymentMobile = document.getElementById("paymentMobile").value;
    var paymentAddress = document.getElementById("paymentAddress").value;
    var paymentAmount = document.getElementById("paymentAmount").value;


    // Called when user completed the payment. It can be a successful payment or failure
    payhere.onCompleted = function onCompleted(orderId) {
        alert("Payment completed. OrderID:" + orderId);
        //Note: validate the payment and show success or failure page to the customer
    };

    // Called when user closes the payment without completing
    payhere.onDismissed = function onDismissed() {
        //Note: Prompt user to pay again or show an error page
        alert("Payment dismissed");
    };

    // Called when error happens when initializing payment such as invalid parameters
    payhere.onError = function onError(error) {
        // Note: show an error page
        alert("Error:" + error);
    };


    // Put the payment variables here
    var payment = {
        "sandbox": true,
        "merchant_id": "1219233", // Replace your Merchant ID
        "return_url": "", // Important
        "cancel_url": "", // Important
        "notify_url": "http://poojithairosha.tk/payhere_notify.php",
        "order_id": orderId,
        "items": "English Class Fees - Chinthana Gallage",
        "amount": paymentAmount,
        "currency": "LKR",
        "first_name": paymentFname,
        "last_name": paymentLname,
        "email": paymentEmail,
        "phone": paymentMobile,
        "address": paymentAddress,
        "city": "Colombo",
        "country": "Sri Lanka",
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    payhere.startPayment(payment);

}

// Update Scheduled Classes
function updateClass(classId) {
    var c = confirm("Are you sure?");
    if (c) {
        var upclassName = document.getElementById("upclassName");
        var upclassDate = document.getElementById("upclassDate");
        var upclassTimeFrom = document.getElementById("upclassTimeFrom");
        var upclassTimeTo = document.getElementById("upclassTimeTo");
        var upclassLink = document.getElementById("upclassLink");


        var form = new FormData();
        form.append("title", upclassName.value);
        form.append("date", upclassDate.value);
        form.append("time_from", upclassTimeFrom.value);
        form.append("time_to", upclassTimeTo.value);
        form.append("link", upclassLink.value);
        form.append("id", classId);

        var request = new XMLHttpRequest();
        request.onreadystatechange = () => {
            if (request.readyState == 4) {
                var text = request.responseText;
                if (text == "success") {
                    window.location = "adminHome.php";
                    closeMsg();
                } else {
                    document.getElementById("errorDiv").classList.remove("d-none");
                    document.getElementById("errMsg").innerHTML = text;
                }
            }
        }

        request.open("POST", "processes/classUpdateProcess.php", true);
        request.send(form);
    }
}

// Delete scheduled classes
function deleteClass(id) {
    var c = confirm("Are you sure?");
    if (c) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = () => {
            if (request.readyState == 4) {
                var text = request.responseText;
                if (text == "success") {
                    alert("Selected class has been deleted successfully");
                    window.location = "adminHome.php";
                } else {
                    alert(text);
                }
            }
        }
        request.open("GET", "processes/deleteClass.php?class=" + id, true);
        request.send();
    }
}

// Schedule New Classes
function scheduleClass() {
    var className = document.getElementById("className");
    var classDate = document.getElementById("classDate");
    var classTimeFrom = document.getElementById("classTimeFrom");
    var classTimeTo = document.getElementById("classTimeTo");
    var classLink = document.getElementById("classLink");
    var classGrade = document.getElementById("classGrade");


    var form = new FormData();
    form.append("title", className.value);
    form.append("date", classDate.value);
    form.append("time_from", classTimeFrom.value);
    form.append("time_to", classTimeTo.value);
    form.append("link", classLink.value);
    form.append("grade", classGrade.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                window.location = "adminHome.php";
                closeMsg();
            } else {
                document.getElementById("errorDiv").classList.remove("d-none");
                document.getElementById("errMsg").innerHTML = text;
            }
        }
    }
    request.open("POST", "processes/scheduleClassProcess.php", true);
    request.send(form);
}

// Delete a student
function deleteStudent(student_email) {
    var c = confirm("Are you sure ?");
    if (c) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = () => {
            if (request.readyState == 4) {
                var text = request.responseText;
                if (text == "success") {
                    window.location = "manageStudents.php";
                }
            }
        }
        request.open("GET", "processes/deleteStudentProcess.php?student_email=" + student_email, true);
        request.send();
    }
}

// Update Student Details
function updateStudent(student_email) {
    var stdUpdateEmail = document.getElementById("stdUpdateEmail");
    var stdUpdateFname = document.getElementById("stdUpdateFname");
    var stdUpdateLname = document.getElementById("stdUpdateLname");
    var stdUpdateMobile = document.getElementById("stdUpdateMobile");
    var stdUpdatePwd = document.getElementById("stdUpdatePwd");
    var stdUpdateStatus = document.getElementById("stdUpdateStatus");
    var stdUpdateGrade = document.getElementById("stdUpdateGrade");

    var form = new FormData();
    form.append("stdUpdateEmail", stdUpdateEmail.value);
    form.append("stdUpdateFname", stdUpdateFname.value);
    form.append("stdUpdateLname", stdUpdateLname.value);
    form.append("stdUpdateMobile", stdUpdateMobile.value);
    form.append("stdUpdatePwd", stdUpdatePwd.value);
    form.append("stdUpdateStatus", stdUpdateStatus.value);
    form.append("stdUpdateGrade", stdUpdateGrade.value);
    form.append("student_email", student_email);

    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                var c = confirm("Do you need to update the student's details?");

                if (c) {
                    window.location = "manageStudents.php";
                }
            } else {
                document.getElementById("alertMsg").innerHTML = text;
                document.getElementById("alertDiv").classList.toggle("d-none");
                // alert(text);
            }
        }
    }

    request.open("POST", "processes/adminUpdateStudentProcess.php", true);
    request.send(form);
}

// Change Student's Active Status
function changeStatus(student_email) {
    var statusSwitch = document.getElementById("statusSwitch");

    var status;
    if (statusSwitch.checked) {
        status = 1;
    } else {
        status = 2;
    }

    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                alert("Student's active/deactive status changed");
                window.location.reload();


            }
        }
    }
    request.open("GET", "processes/changeStudentStatus.php?student_email=" + student_email + "&status_id=" + status, true);
    request.send();
}

// Sort Students
function sortStudents(x) {
    var sortByGrade = document.getElementById("sort-by-grade");
    var sortByName = document.getElementById("sort-by-name");
    var sortByEmail = document.getElementById("sort-by-email");

    var sortByStatus;

    if (document.getElementById("users-status-disabled").checked) {
        sortByStatus = 2;
    } else if (document.getElementById("users-status-active").checked) {
        sortByStatus = 1;

    }

    var form = new FormData();
    form.append("grade", sortByGrade.value);
    form.append("name", sortByName.value);
    form.append("email", sortByEmail.value);
    form.append("status", sortByStatus);
    form.append("page", x);

    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            document.getElementById("results").innerHTML = text;
        }
    }
    request.open("POST", "processes/sortProcess.php", true);
    request.send(form);

}

// Reset
function resetSortStudents() {
    window.location = "manageStudents.php";
}

// Register a new student
function registerStudent() {
    var stdRegEmail = document.getElementById("stdRegEmail");
    var stdRegFname = document.getElementById("stdRegFname");
    var stdRegLname = document.getElementById("stdRegLname");
    var stdRegMobile = document.getElementById("stdRegMobile");
    var stdRegPwd = document.getElementById("stdRegPwd");
    var stdRegGrade = document.getElementById("stdRegGrade");
    var stdRegStatus = document.getElementById("stdRegStatus");

    var form = new FormData();
    form.append("email", stdRegEmail.value);
    form.append("fname", stdRegFname.value);
    form.append("lname", stdRegLname.value);
    form.append("mobile", stdRegMobile.value);
    form.append("pwd", stdRegPwd.value);
    form.append("grade", stdRegGrade.value);
    form.append("status", stdRegStatus.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                window.location = "manageStudents.php";
            } else {
                document.getElementById("alertMsg").innerHTML = text;
                document.getElementById("alertDiv").classList.toggle("d-none");
            }
        }
    }
    request.open("POST", "processes/registerStudentProcess.php", true);
    request.send(form);
}

function showLoader() {

}

// Payment Slip Modal
function showPaymentSlipImgModal(email) {
    var form = new FormData();
    form.append("email", email);

    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            document.getElementById("paymentImgResults").innerHTML = "";
            var modal = new bootstrap.Modal(document.getElementById("paymentSlipImg")).show();
            const tmout = setTimeout(() => {
                document.getElementById("loader").classList.add("d-none");
                document.getElementById("paymentImgResults").innerHTML += text;
            }, 1000);

        }
    }
    request.open("POST", "processes/paymentSlipsProcess.php", true);
    request.send(form);

    // var modal = new bootstrap.Modal(document.getElementById("paymentSlipImg")).show();

}

// Hide PaymentSlip Modal
function hidePaymentSlipImgModal() {
    document.getElementById("paymentImgResults").innerHTML = "";
    setTimeout(() => {
        document.getElementById("loader").classList.remove("d-none");
    }, 200);
    window.location.reload();
}

// Show Payment Slip Image Modal - Nested
function showPaymentSlipImg(url) {
    document.getElementById("slipImg").src = url;
    document.getElementById("imageResult").classList.toggle("d-none");

}

function restoreDiv() {
    setTimeout(() => {
        document.getElementById("imageResult").classList.toggle("d-none");
    }, 1000);

}
// Show Payment Slip Image Modal - Nested

// Show Student Attendance Modal
function showStudentAttendanceModal(email) {

    var form = new FormData();
    form.append("email", email);

    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            var modal = new bootstrap.Modal(document.getElementById("studentAttendance")).show();
            const timeout = setTimeout(() => {
                document.getElementById("loader2").classList.add("d-none");
                document.getElementById("studentAttendanceResults").innerHTML = text;
            }, 1000)

        }
    }
    request.open("POST", "processes/loadAttendanceProcess.php", true);
    request.send(form);

}

// Hide Student Attendance Modal
function hideStudentAttendanceModal() {
    setTimeout(() => {
        document.getElementById("loader2").classList.remove("d-none");
    }, 500);
    window.location.reload();
}

// Activate All Students
function ativateAllStudents() {
    var c = confirm("Are you sure? This will activate all the students.");
    if (c) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = () => {
            if (request.readyState = 4) {
                var text = request.responseText;
                if (text == "success") {
                    window.location.reload();
                }
            }
        }
        request.open("GET", "processes/ativateAllStudents.php", true);
        request.send();
    }
}

// Mark Attendence
function markAttendence(class_id) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            // alert(text);
        }
    }
    request.open("GET", "processes/markAttendence.php?class_id=" + class_id, true);
    request.send();
}

// BEGIN NOTIFICATION

function loadNotifications() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            setTimeout(() => {
                document.getElementById("notificationResults").innerHTML = text;
            }, 3000);
        }
    }
    request.open("GET", "processes/loadNotificationsProcess.php", true);
    request.send();
}

function changeNotificationViewStatus(id) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var text = request.responseText;
            window.location.reload();
        }
    }
    request.open("GET", "processes/changeNotificationViewStatus.php?id=" + id, true);
    request.send();
}

// function loadStudentDataNotification(email) {
//     // window.location.assign("manageStudents.php");

//     if (document.readyState === 'complete') {
//         // The page is fully loaded
//         var sortByGrade = document.getElementById("sort-by-grade");
//         var sortByName = document.getElementById("sort-by-name");

//         var sortByStatus;

//         if (document.getElementById("users-status-disabled").checked) {
//             sortByStatus = 2;
//         } else if (document.getElementById("users-status-active").checked) {
//             sortByStatus = 1;

//         }

//         var form = new FormData();
//         form.append("grade", sortByGrade.value);
//         form.append("name", sortByName.value);
//         form.append("email", email);
//         form.append("status", sortByStatus);
//         form.append("page", "0");

//         var request = new XMLHttpRequest();
//         request.onreadystatechange = () => {
//             if (request.readyState == 4) {
//                 var text = request.responseText;
//                 document.getElementById("notificationResults").innerHTML += text;
//             }
//         }
//         request.open("POST", "processes/sortProcess.php", true);
//         request.send(form);
//     }
// }
// END NOTIFICATION