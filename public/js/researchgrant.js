//Add dynamic field to form

function addFieldsResGrant()
{
    
    // Number of inputs to create
    var number = document.getElementById("resgrant-form-list-of-authors").value;
    
    // Container <div> where dynamic content will be placed
    var container = document.getElementById("fill-authors-form-resgrant");
    
    // Clear previous contents of the container
    while (container.hasChildNodes())
    {
        container.removeChild(container.lastChild);
    }
    
    for (i=1; i<=number; i++)
    {

        var myDiv = document.createElement("div");

        //Heder for author info
        var h5 = document.createElement("h5");
        h5.appendChild(document.createTextNode("Co-investigator "+i+":"));
        h5.className = 'header-shape';
        container.appendChild(h5);


        //Zero div

        var div0 = document.createElement("div");

        div0.className = 'form-group row';      
        
        var div01 = document.createElement("div");

        div01.className = ' col-sm-5';      

        var div02 = document.createElement("div");

        div02.className = ' col-sm-5';        

        // Create an <input> element, set its type and name attributes
        var firstNameAu = document.createElement("input");
        firstNameAu.type = "text";
        firstNameAu.className += 'form-control';
        firstNameAu.id = 'get-author'+i+'-first-name-res';
        firstNameAu.placeholder = 'First Name';

        div01.appendChild(firstNameAu);
        

        var lastNameAu = document.createElement("input");
        lastNameAu.type = "text";
        lastNameAu.className += 'form-control';
        lastNameAu.id = 'get-author'+i+'-last-name-res';
        lastNameAu.placeholder = 'Last Name'

        div02.appendChild(lastNameAu);

        div0.appendChild(div01);
        div0.appendChild(div02);

        //End Zero div

        //first div
        var div1 = document.createElement("div");

        div1.className = 'form-group row';


        var div11 = document.createElement("div");

        div11.className = 'col-sm-5';


        var label = document.createElement("label");

        var strong = document.createElement("strong");

        strong.appendChild(document.createTextNode("Prefix"));

        label.appendChild(strong);

        div11.appendChild(label);

        //Create and append select list
        var selectList1 = document.createElement("select");
        selectList1.id = 'res-co-inves'+i+'-prefix';
        selectList1.className = "form-control";

        var option1 = document.createElement("option");
        var option2 = document.createElement("option");
        var option3 = document.createElement("option");
        var option4 = document.createElement("option");
        var option5 = document.createElement("option");

        option1.selected;
        option1.hidden = true;
        option1.text = "-Select-"
        option2.text = "Dr.";
        option3.text = "Prof.";
        option4.text = "Mr.";
        option5.text = "Ms.";

        selectList1.appendChild(option1);
        selectList1.appendChild(option2);
        selectList1.appendChild(option3);
        selectList1.appendChild(option4);
        selectList1.appendChild(option5);


        div11.appendChild(selectList1);


        var div12 = document.createElement("div");

        div12.className = 'col-sm-5';


        var label = document.createElement("label");

        var strong = document.createElement("strong");

        strong.appendChild(document.createTextNode("Department"));

        label.appendChild(strong);

        div12.appendChild(label);

        //Create and append select list
        var selectList2 = document.createElement("select");
        selectList2.id = 'res-co-inves'+i+'-dept';
        selectList2.className = "form-control";

        var option1 = document.createElement("option");
        var option2 = document.createElement("option");
        var option3 = document.createElement("option");
        var option4 = document.createElement("option");
        var option5 = document.createElement("option");
        var option6 = document.createElement("option");
        var option7 = document.createElement("option");

        option1.selected;
        option1.hidden = true;
        option1.text = "-Select-"
        option2.text = "Computer Science & Engineering";
        option3.text = "Electrical & Electronics Engineering";
        option4.text = "Electrical & Telecommunication Engineering";
        option5.text = "Media Studies & Journalism";
        option6.text = "Business Administration";
        option7.text = "English & Humanities";

        selectList2.appendChild(option1);
        selectList2.appendChild(option2);
        selectList2.appendChild(option3);
        selectList2.appendChild(option4);
        selectList2.appendChild(option5);
        selectList2.appendChild(option6);
        selectList2.appendChild(option7);

        div12.appendChild(selectList2);

        div1.appendChild(div11);
        div1.appendChild(div12);

        //End first Div


        //Second div
        var div2 = document.createElement("div");

        div2.className = 'form-group row';


        var div21 = document.createElement("div");

        div21.className = 'col-sm-5';


        var label = document.createElement("label");

        var strong = document.createElement("strong");

        strong.appendChild(document.createTextNode("Designation"));

        label.appendChild(strong);

        div21.appendChild(label);

        //Create and append select list
        var selectList3 = document.createElement("select");
        selectList3.id = 'res-co-inves'+i+'-designation';
        selectList3.className = "form-control";

        var option1 = document.createElement("option");
        var option2 = document.createElement("option");
        var option3 = document.createElement("option");
        var option4 = document.createElement("option");
        var option5 = document.createElement("option");

        option1.selected;
        option1.hidden = true;
        option1.text = "-Select-"
        option2.text = "Professor";
        option3.text = "Associate Professor";
        option4.text = "Assistant Professor";
        option5.text = "Senior Lecturer";
        option6.text = "Lecturer";

        selectList3.appendChild(option1);
        selectList3.appendChild(option2);
        selectList3.appendChild(option3);
        selectList3.appendChild(option4);
        selectList3.appendChild(option5);
        selectList3.appendChild(option6);


        div21.appendChild(selectList3);



        var div22 = document.createElement("div");

        div22.className = 'col-sm-5';


        var label = document.createElement("label");

        var strong = document.createElement("strong");

        strong.appendChild(document.createTextNode("Status"));

        label.appendChild(strong);

        div22.appendChild(label);

        //Create and append select list
        var selectList4 = document.createElement("select");
        selectList4.id = 'res-co-inves'+i+'-status';
        selectList4.className = "form-control";

        var option1 = document.createElement("option");
        var option2 = document.createElement("option");
        var option3 = document.createElement("option");
        var option4 = document.createElement("option");

        option1.selected;
        option1.hidden = true;
        option1.text = "-Select-"
        option2.text = "Full Time";
        option3.text = "Part-time/Adjuct";
        option4.text = "Other(Please Specify)";

        selectList4.appendChild(option1);
        selectList4.appendChild(option2);
        selectList4.appendChild(option3);
        selectList4.appendChild(option4);

        div22.appendChild(selectList4);

        div2.appendChild(div21);
        div2.appendChild(div22);

        //End Second Div

        //Third div
        var div3 = document.createElement("div");

        div3.className = 'form-group row';

        var div31 = document.createElement("div");

        div31.className = 'col-sm-10';

        var input = document.createElement("input");

        input.type = 'text';
        input.className = 'form-control';
        input.id = 'res-co-inves'+i+'-status-specify';
        input.placeholder = "Please pecify if 'Status' is 'Other'";

        div31.appendChild(input);

        div3.appendChild(div31);
        //End third div

        /*//CV
        var inputFile = document.createElement("input");
        inputFile.type = "file";
        inputFile.id = 'res-co-inves'+i+'-file';

        var labelFile = document.createElement("label");
        var strongFile = document.createElement("strong");

        strongFile.appendChild(document.createTextNode("CV of Co-Investigator "+i+": "));

        labelFile.appendChild(strongFile);

        var div4 = document.createElement("div");
        var div41 = document.createElement("div");
        var div42 = document.createElement("div");

        div4.className = 'form-group';

        div41.appendChild(labelFile);
        div42.appendChild(inputFile);

        div4.appendChild(div41);
        div4.appendChild(div42);*/

        myDiv.appendChild(div0);
        myDiv.appendChild(div1);
        myDiv.appendChild(div2);
        myDiv.appendChild(div3);
        //myDiv.appendChild(div4);

        container.appendChild(myDiv);
        
        // Append a line break 
        container.appendChild(document.createElement("br"));
    }
}


function getResGrantForm()
{
    var totalInvestors = document.getElementById("resgrant-form-list-of-authors").value;
    var resGrantTitle = document.getElementById("res-grant-title").value;
    var resGrantArea = document.getElementById("research-grant-area").value;

    document.getElementById("set-resgrant-form-list-of-authors").value = totalInvestors;
    document.getElementById("set-res-grant-title").value = resGrantTitle;
    document.getElementById("set-research-grant-area").value = resGrantArea;


    //Investigator details
    var resInvesPrefix = document.getElementById("research-investigator-prefix").value;
    var resInvesDesignation = document.getElementById("research-investigator-designation").value;
    var resInvesFirstName = document.getElementById("research-investigator-first-name").value;
    var resInvesLastName = document.getElementById("research-investigator-last-name").value;
    var resInvesDepartment = document.getElementById("research-investigator-department").value;
    var resInvesEmail = document.getElementById("research-investigator-email").value;
    var resInvesContact = document.getElementById("research-investigator-contact").value;
    //var resInvesFile = document.getElementById("res-upload-file-pi").value;


    document.getElementById("set-research-investigator-prefix").value = resInvesPrefix;
    document.getElementById("set-research-investigator-designation").value = resInvesDesignation;
    document.getElementById("set-research-investigator-first-name").value = resInvesFirstName;
    document.getElementById("set-research-investigator-last-name").value = resInvesLastName;
    document.getElementById("set-research-investigator-department").value = resInvesDepartment;
    document.getElementById("set-research-investigator-email").value = resInvesEmail;
    document.getElementById("set-research-investigator-contact").value = resInvesContact;
    //document.getElementById("set-res-upload-file-pi").value = resInvesFile;
    //End Investigator details


    //Co-investigator details
    var number = document.getElementById("resgrant-form-list-of-authors").value;

    document.getElementById("set-resgrant-form-list-of-authors").value = number;

    var modalContainer = document.getElementById("fill-up-authors-form-resgrant");

    for(i=1; i<=number; i++)
    {

        var myDiv = document.createElement("div");

        //Heder for author info
        var h5 = document.createElement("h5");
        h5.appendChild(document.createTextNode("Co-investigator "+i+":"));
        h5.className = 'header-shape';
        modalContainer.appendChild(h5);


        var resCoInvesFirstName = document.getElementById('get-author'+i+'-first-name-res').value;
        var resCoInvesLastName = document.getElementById('get-author'+i+'-last-name-res').value;
        var resCoInvesPrefix = document.getElementById('res-co-inves'+i+'-prefix').value;
        var resCoInvesDepartment = document.getElementById('res-co-inves'+i+'-dept').value;
        var resCoInvesDesignation = document.getElementById('res-co-inves'+i+'-designation').value;
        var resCoInvesStatus = document.getElementById('res-co-inves'+i+'-status').value;
        var resCoInvesStatusSpecify = document.getElementById('res-co-inves'+i+'-status-specify').value;
        //var resCoInvesFile = document.getElementById('res-co-inves'+i+'-file').value;



        //Zero div

        var div0 = document.createElement("div");

        div0.className = 'form-group row';      
        
        var div01 = document.createElement("div");

        div01.className = ' col-sm-6';      

        var div02 = document.createElement("div");

        div02.className = ' col-sm-6';        

        // Create an <input> element, set its type and name attributes
        var firstNameAu = document.createElement("input");
        firstNameAu.type = "text";
        firstNameAu.name = 'coInves'+i+'FirstName';
        firstNameAu.readOnly = true;
        firstNameAu.className += 'form-control';
        firstNameAu.value = resCoInvesFirstName;

        div01.appendChild(firstNameAu);
        

        var lastNameAu = document.createElement("input");
        lastNameAu.type = "text";
        lastNameAu.name = 'coInves'+i+'LastName';
        lastNameAu.readOnly = true;
        lastNameAu.className += 'form-control';
        lastNameAu.value = resCoInvesLastName;

        div02.appendChild(lastNameAu);

        div0.appendChild(div01);
        div0.appendChild(div02);

        //End Zero div

        //One div

        var div1 = document.createElement("div");

        div1.className = 'form-group row';      
        
        var div11 = document.createElement("div");

        div11.className = 'col-sm-6';      

        var div12 = document.createElement("div");

        div12.className = 'col-sm-6';        

        // Create an <input> element, set its type and name attributes
        var coPrefix = document.createElement("input");
        coPrefix.type = "text";
        coPrefix.name = 'coInves'+i+'Prefix';
        coPrefix.readOnly = true;
        coPrefix.className += 'form-control';
        coPrefix.value = resCoInvesPrefix;

        div11.appendChild(coPrefix);
        

        var coDept = document.createElement("input");
        coDept.type = "text";
        coDept.name = 'coInves'+i+'Department';
        coDept.readOnly = true;
        coDept.className += 'form-control';
        coDept.value = resCoInvesDepartment;

        div12.appendChild(coDept);

        div1.appendChild(div11);
        div1.appendChild(div12);

        //End One div


        //Two div


        var div2 = document.createElement("div");

        div2.className = 'form-group row';      
        
        var div21 = document.createElement("div");

        div21.className = 'col-sm-6';      

        var div22 = document.createElement("div");

        div22.className = 'col-sm-6';        

        // Create an <input> element, set its type and name attributes
        var coDesignation = document.createElement("input");
        coDesignation.type = "text";
        coDesignation.name = 'coInves'+i+'Designation';
        coDesignation.readOnly = true;
        coDesignation.className += 'form-control';
        coDesignation.value = resCoInvesDesignation;

        div21.appendChild(coDesignation);
        

        var coStatus = document.createElement("input");
        coStatus.type = "text";
        coStatus.name = 'coInves'+i+'Status';
        coStatus.readOnly = true;
        coStatus.className += 'form-control';
        coStatus.value = resCoInvesStatus;

        div22.appendChild(coStatus);

        div2.appendChild(div21);
        div2.appendChild(div22);
        //End Two div

        //Third div
        var div3 = document.createElement("div");

        div3.className = 'form-group row';

        var div31 = document.createElement("div");

        div31.className = 'col-sm-12';

        var inputS = document.createElement("input");
        inputS.type = 'text';
        inputS.name = 'coInves'+i+'StatusSpecify';
        inputS.readOnly = true;
        inputS.className = 'form-control';
        inputS.value = resCoInvesStatusSpecify;

        div31.appendChild(inputS);

        div3.appendChild(div31);
        //End third div

        //CV
        var inputFile = document.createElement("input");
        inputFile.type = "file";
        inputFile.className = "header-shape-border";
        inputFile.name = 'coInves'+i+'fileName';
        inputFile.accept = ".doc, .docx, .pdf";
        //inputFile.value = resCoInvesFile;

        var labelFile = document.createElement("label");
        var strongFile = document.createElement("strong");

        strongFile.appendChild(document.createTextNode("CV of Co-Investigator "+i+": "));

        labelFile.appendChild(strongFile);

        var div4 = document.createElement("div");
        var div41 = document.createElement("div");
        var div42 = document.createElement("div");

        div4.className = 'form-group';

        div41.appendChild(labelFile);
        div42.appendChild(inputFile);

        div4.appendChild(div41);
        div4.appendChild(div42);

        myDiv.appendChild(div0);
        myDiv.appendChild(div1);
        myDiv.appendChild(div2);
        myDiv.appendChild(div3);
        myDiv.appendChild(div4);

        modalContainer.appendChild(myDiv);



    }
    //End Co-investigator details


    //Research Proposal
    var resIntroBackground = document.getElementById("research-intro-back").value;
    var resQuestion = document.getElementById("research-question").value;
    var resBiblography = document.getElementById("research-biblography").value;
    var resMethodology = document.getElementById("research-methodology").value;

    document.getElementById("set-research-intro-back").value = resIntroBackground;
    document.getElementById("set-research-question").value = resQuestion;
    document.getElementById("set-research-biblography").value = resBiblography;
    document.getElementById("set-research-methodology").value = resMethodology;
    //End Research Proposal

    //Research Outcome
    var resNameOfJCP1 = document.getElementById("res-name-of-jcp1").value;
    var resNameOfJCP1Index = document.getElementById("res-name-of-jcp1-index").value;
    var resNameOfJCP2 = document.getElementById("res-name-of-jcp2").value;
    var resNameOfJCP2Index = document.getElementById("res-name-of-jcp2-index").value;
    var resNameOfJCP3 = document.getElementById("res-name-of-jcp3").value;
    var resNameOfJCP3Index = document.getElementById("res-name-of-jcp3-index").value;
    var resPatentInfo = document.getElementById("research-patent-info").value;
    var resPublishingCountry = document.getElementById("research-publishing-country").value;
    var resTentativeBudget = document.getElementById("research-tentative-budget").value;
    var resCoInvesDifIns = document.getElementById("research-co-investigator-dif-inst").value;
    var resOpportunity = document.getElementById("research-detail-opportunity").value;


    document.getElementById("set-res-name-of-jcp1").value = resNameOfJCP1;
    document.getElementById("set-res-name-of-jcp1-index").value = resNameOfJCP1Index;
    document.getElementById("set-res-name-of-jcp2").value = resNameOfJCP2;
    document.getElementById("set-res-name-of-jcp2-index").value = resNameOfJCP2Index;
    document.getElementById("set-res-name-of-jcp3").value = resNameOfJCP3;
    document.getElementById("set-res-name-of-jcp3-index").value = resNameOfJCP3Index;
    document.getElementById("set-research-patent-info").value = resPatentInfo;
    document.getElementById("set-research-publishing-country").value = resPublishingCountry;
    document.getElementById("set-research-tentative-budget").value = resTentativeBudget;
    document.getElementById("set-research-co-investigator-dif-inst").value = resCoInvesDifIns;
    document.getElementById("set-research-detail-opportunity").value = resOpportunity;

}