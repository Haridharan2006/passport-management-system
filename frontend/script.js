let globalData = [];

function viewAll() {
    fetch("../backend/getCompleteData.php")
    .then(res => res.json())
    .then(data => {
        console.log("DATA:", data);
        globalData = data;
        displayTable(data);
    });
}

function displayTable(data) {
    let table = document.getElementById("tableBody");
    table.innerHTML = "";

    data.forEach(row => {
        let tr = `
        <tr>
            <td>${row.APPLICANT_ID}</td>
            <td>${row.NAME}</td>
            <td>${row.APPLICATION_ID || '-'}</td>
            <td>${row.TYPE || '-'}</td>
            <td>${row.AMOUNT || '-'}</td>
            <td>${row.VERIFICATION_STATUS || '-'}</td>
            <td>${row.PASSPORT_ID || '-'}</td>
            <td>${row.PASSPORT_STATUS || 'Not Issued'}</td>
        </tr>`;
        table.innerHTML += tr;
    });
}

function firstRecord() {
    if (globalData.length > 0) {
        displayTable([globalData[0]]);
    } else {
        alert("No data available");
    }
}

function lastRecord() {
    if (globalData.length > 0) {
        displayTable([globalData[globalData.length - 1]]);
    } else {
        alert("No data available");
    }
}

function searchApplicant() {
    let id = document.getElementById("searchId").value;

    fetch("../backend/searchApplicant.php?id=" + id)
    .then(res => res.text())
    .then(text => {
        console.log("RAW:", text);

        let data = JSON.parse(text);

        if (data.length === 0) {
            alert("No record found");
        } else {
            displayTable(data);
        }
    });
}

function addApplicant(){
    const idVal = document.getElementById("id").value;
    const nameVal = document.getElementById("name").value;
    fetch('../backend/addApplicant.php',{
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:`id=${idVal}&name=${nameVal}`
    })
    .then(r=>r.text())
    .then(msg=>{
        alert(msg);
        viewAll();
    });
}

function updateApplicant(){
    fetch('../backend/updateApplicant.php',{
        method:'POST',
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        body:`id=${uid.value}&name=${newname.value}`
    }).then(r=>r.text()).then(alert);
}

function deleteApplicant(){
    fetch('../backend/deleteApplicant.php',{
        method:'POST',
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        body:`id=${did.value}`
    }).then(r=>r.text()).then(alert);
}

function addApplication(){
    fetch('../backend/addApplication.php',{
        method:'POST',
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        body:`appId=${appId.value}&applicantId=${applicantId.value}&type=${type.value}`
    }).then(r=>r.text()).then(alert);
}

function addPayment(){
    fetch('../backend/addPayment.php',{
        method:'POST',
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        body:`payId=${payId.value}&appIdPay=${appIdPay.value}&amount=${amount.value}`
    }).then(r=>r.text()).then(alert);
}

function addVerification(){
    fetch('../backend/addVerification.php',{
        method:'POST',
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        body:`verId=${verId.value}&appIdVer=${appIdVer.value}&verStatus=${verStatus.value}`
    }).then(r=>r.text()).then(alert);
}

function addPassport(){
    const pidVal = document.getElementById("pid").value;
    const aidVal = document.getElementById("aid").value;
    const statusVal = document.getElementById("status").value;
        fetch('../backend/addPassport.php',{
        method:'POST',
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        body:`pid=${pidVal}&aid=${aidVal}&status=${statusVal}`
    })
    .then(r=>r.text()).then(alert);
}