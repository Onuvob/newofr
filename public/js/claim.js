//Add dynamic field to form

function addFieldsJour()
{
    
    // Number of inputs to create
    var number = document.getElementById("journal-form-list-of-authors").value;
    
    // Container <div> where dynamic content will be placed
    var container = document.getElementById("fill-authors-form-jour");
    
    // Clear previous contents of the container
    while (container.hasChildNodes())
    {
        container.removeChild(container.lastChild);
    }
    
    for (i=1; i<=number; i++)
    {
        //Heder for author info
        var h5 = document.createElement("h5");
        h5.appendChild(document.createTextNode("Author "+i+":"));
        h5.className = 'header-shape';
        container.appendChild(h5);

        //div1 for first name and last name's div and div11 and div12 for consequently both of them
        var div1 = document.createElement("div");
        var div11 = document.createElement("div");
        var div12 = document.createElement("div");

        div1.className = 'row';
        div11.className = 'col-sm-5';
        div12.className = 'col-sm-5';

        // Create an <input> element, set its type and name attributes
        var firstNameAu = document.createElement("input");
        firstNameAu.type = "text";
        firstNameAu.className += 'form-control';
        firstNameAu.id = 'get-author'+i+'-first-name-jour';
        firstNameAu.placeholder = 'First Name';
        

        var lastNameAu = document.createElement("input");
        lastNameAu.type = "text";
        lastNameAu.className += 'form-control';
        lastNameAu.id = 'get-author'+i+'-last-name-jour';
        lastNameAu.placeholder = 'Last Name'


        var email = document.createElement("input");
        email.type = "email";
        email.id = 'get-author'+i+'-email-jour';
        email.className += 'form-control col-sm-10 get-author'+i+'-email';
        email.placeholder = 'Email Address';


        div11.appendChild(firstNameAu);
        div12.appendChild(lastNameAu);

        div1.appendChild(div11);
        div1.appendChild(div12);

        container.appendChild(div1);

        div11.appendChild(document.createElement("br"));
        div12.appendChild(document.createElement("br"));

        container.appendChild(email);
        
        // Append a line break 
        container.appendChild(document.createElement("br"));
    }
}



function addFieldsConf()
{
    
    // Number of inputs to create
    var number = document.getElementById("get-conference-list-of-authors").value;
    
    // Container <div> where dynamic content will be placed
    var container = document.getElementById("fill-authors-form-conf");
    
    // Clear previous contents of the container
    while (container.hasChildNodes())
    {
        container.removeChild(container.lastChild);
    }
    
    for (i=1; i<=number; i++)
    {
        //Heder for author info
        var h5 = document.createElement("h5");
        h5.appendChild(document.createTextNode("Author "+i+":"));
        h5.className = 'header-shape';
        container.appendChild(h5);

        //div1 for first name and last name's div and div11 and div12 for consequently both of them
        var div1 = document.createElement("div");
        var div11 = document.createElement("div");
        var div12 = document.createElement("div");

        div1.className = 'row';
        div11.className = 'col-sm-5';
        div12.className = 'col-sm-5';

        // Create an <input> element, set its type and name attributes
        var firstNameAu = document.createElement("input");
        firstNameAu.type = "text";
        firstNameAu.className += 'form-control';
        firstNameAu.id = 'get-author'+i+'-first-name-conf';
        firstNameAu.placeholder = 'First Name';
        

        var lastNameAu = document.createElement("input");
        lastNameAu.type = "text";
        lastNameAu.className += 'form-control';
        lastNameAu.id = 'get-author'+i+'-last-name-conf';
        lastNameAu.placeholder = 'Last Name'


        var email = document.createElement("input");
        email.type = "email";
        email.id = 'get-author'+i+'-email-conf';
        email.className += 'form-control col-sm-10';
        email.placeholder = 'Email Address';


        div11.appendChild(firstNameAu);
        div12.appendChild(lastNameAu);

        div1.appendChild(div11);
        div1.appendChild(div12);

        container.appendChild(div1);

        div11.appendChild(document.createElement("br"));
        div12.appendChild(document.createElement("br"));

        container.appendChild(email);
        
        // Append a line break 
        container.appendChild(document.createElement("br"));
    }
}


function addFieldsBook()
{
    
    // Number of inputs to create
    var number = document.getElementById("get-book-list-of-authors").value;
    
    // Container <div> where dynamic content will be placed
    var container = document.getElementById("fill-authors-form-book");
    
    // Clear previous contents of the container
    while (container.hasChildNodes())
    {
        container.removeChild(container.lastChild);
    }
    
    for (i=1; i<=number; i++)
    {
        //Heder for author info
        var h5 = document.createElement("h5");
        h5.appendChild(document.createTextNode("Author "+i+":"));
        h5.className = 'header-shape';
        container.appendChild(h5);

        //div1 for first name and last name's div and div11 and div12 for consequently both of them
        var div1 = document.createElement("div");
        var div11 = document.createElement("div");
        var div12 = document.createElement("div");

        div1.className = 'row';
        div11.className = 'col-sm-5';
        div12.className = 'col-sm-5';

        // Create an <input> element, set its type and name attributes
        var firstNameAu = document.createElement("input");
        firstNameAu.type = "text";
        firstNameAu.className += 'form-control';
        firstNameAu.id = 'get-author'+i+'-first-name-book';
        firstNameAu.placeholder = 'First Name';
        

        var lastNameAu = document.createElement("input");
        lastNameAu.type = "text";
        lastNameAu.className += 'form-control';
        lastNameAu.id = 'get-author'+i+'-last-name-book';
        lastNameAu.placeholder = 'Last Name'


        var email = document.createElement("input");
        email.type = "email";
        email.id = 'get-author'+i+'-email-book';
        email.className += 'form-control col-sm-10';
        email.placeholder = 'Email Address';


        div11.appendChild(firstNameAu);
        div12.appendChild(lastNameAu);

        div1.appendChild(div11);
        div1.appendChild(div12);

        container.appendChild(div1);

        div11.appendChild(document.createElement("br"));
        div12.appendChild(document.createElement("br"));

        container.appendChild(email);
        
        // Append a line break 
        container.appendChild(document.createElement("br"));
    }
}



function addFieldsBookChapter()
{
    
    // Number of inputs to create
    var number = document.getElementById("get-book-chapter-list-of-authors").value;
    
    // Container <div> where dynamic content will be placed
    var container = document.getElementById("fill-authors-form-bookchapter");
    
    // Clear previous contents of the container
    while (container.hasChildNodes())
    {
        container.removeChild(container.lastChild);
    }
    
    for (i=1; i<=number; i++)
    {
        //Heder for author info
        var h5 = document.createElement("h5");
        h5.appendChild(document.createTextNode("Author "+i+":"));
        h5.className = 'header-shape';
        container.appendChild(h5);

        //div1 for first name and last name's div and div11 and div12 for consequently both of them
        var div1 = document.createElement("div");
        var div11 = document.createElement("div");
        var div12 = document.createElement("div");

        div1.className = 'row';
        div11.className = 'col-sm-5';
        div12.className = 'col-sm-5';

        // Create an <input> element, set its type and name attributes
        var firstNameAu = document.createElement("input");
        firstNameAu.type = "text";
        firstNameAu.className += 'form-control';
        firstNameAu.id = 'get-author'+i+'-first-name-bookchapter';
        firstNameAu.placeholder = 'First Name';
        

        var lastNameAu = document.createElement("input");
        lastNameAu.type = "text";
        lastNameAu.className += 'form-control';
        lastNameAu.id = 'get-author'+i+'-last-name-bookchapter';
        lastNameAu.placeholder = 'Last Name'


        var email = document.createElement("input");
        email.type = "email";
        email.id = 'get-author'+i+'-email-bookchapter';
        email.className += 'form-control col-sm-10';
        email.placeholder = 'Email Address';


        div11.appendChild(firstNameAu);
        div12.appendChild(lastNameAu);

        div1.appendChild(div11);
        div1.appendChild(div12);

        container.appendChild(div1);

        div11.appendChild(document.createElement("br"));
        div12.appendChild(document.createElement("br"));

        container.appendChild(email);
        
        // Append a line break 
        container.appendChild(document.createElement("br"));
    }
}

//End dynamic field to form


function showHideFeeJournal()
{
    var getOption = document.getElementById("journal-form-type").value;

    //console.log(getOption);

    var changeMe = document.getElementById("apply-hide-journal");

    //var changeMeModal = document.getElementById("set-journal-applying");

    //console.log(changeMe);

    if(getOption == "Non-Indexed Peer Reviewed")
    {
        changeMe.style.display = "none";
        //changeMeModal.style.display = "none";
    }
    else
    {
        changeMe.style.display = "block";
    }
}

function showHideFeeConference()
{
    var getOption = document.getElementById("get-conference-type").value;

    //console.log(getOption);

    var changeMe = document.getElementById("apply-hide-conference");

    //var changeMeModal = document.getElementById("set-conference-applying");

    //console.log(changeMe);

    if(getOption == "Non-Indexed")
    {
        changeMe.style.display = "none";
        //changeMeModal.style.display = "none";
    }
    else
    {
        changeMe.style.display = "block";
    }
}


//claim type changing dynamically
function showHideClaim()
{
      
    var type = document.getElementById("claimType").value;
        
    //console.log(type);

    //Journal
    if(type == "Journal")
    {
        //show the content
        document.getElementById('journal').style.display = 'block';

        //hide the content in case it is open
        document.getElementById('conference').style.display = 'none';
        document.getElementById('book').style.display = 'none';
        document.getElementById('bookChapter').style.display = 'none';
        document.getElementById('research').style.display = 'none';

    }

    //Conference
    else if(type == "Conference")
    {
        //show the content
        document.getElementById('conference').style.display = 'block';

        //hide the content in case it is open
        document.getElementById('journal').style.display = 'none';
        document.getElementById('book').style.display = 'none';
        document.getElementById('bookChapter').style.display = 'none';
        document.getElementById('research').style.display = 'none';
    }

    //Book
    else if(type == "Book")
    {
        //show the content
        document.getElementById('book').style.display = 'block';

        //hide the content in case it is open
        document.getElementById('journal').style.display = 'none';
        document.getElementById('conference').style.display = 'none';
        document.getElementById('bookChapter').style.display = 'none';
        document.getElementById('research').style.display = 'none';

    }

    //Book Chapter
    else if(type == "Book Chapter")
    {
        //show the content
        document.getElementById('bookChapter').style.display = 'block';

        //hide the content in case it is open
        document.getElementById('journal').style.display = 'none';
        document.getElementById('conference').style.display = 'none';
        document.getElementById('book').style.display = 'none';
        document.getElementById('research').style.display = 'none';

    }


    //Project
    else if(type == "Research")
    {
        //show the content
        document.getElementById('research').style.display = 'block';

        //hide the content in case it is open
        document.getElementById('journal').style.display = 'none';
        document.getElementById('conference').style.display = 'none';
        document.getElementById('book').style.display = 'none';
        document.getElementById('bookChapter').style.display = 'none';

    }


}


function getJournalForm()
{
    var prefix = document.getElementsByClassName("get-prefix");
    var firstName = document.getElementsByClassName("get-first-name");
    var lastName = document.getElementsByClassName("get-last-name");
    var designation = document.getElementsByClassName("get-designation");
    var department = document.getElementsByClassName("get-department");
    var claimType = document.getElementsByClassName("get-claim-type");

    document.getElementsByClassName("set-prefix")[0].setAttribute("value", prefix[0].value);
    document.getElementsByClassName("set-first-name")[0].setAttribute("value", firstName[0].value);
    document.getElementsByClassName("set-last-name")[0].setAttribute("value", lastName[0].value);
    document.getElementsByClassName("set-designation")[0].setAttribute("value", designation[0].value);
    document.getElementsByClassName("set-department")[0].setAttribute("value", department[0].value);
    document.getElementsByClassName("set-claim-type")[0].setAttribute("value", claimType[0].value);

    var journalApplyingFor = document.getElementById("journal-applying-for").value;
    //console.log(journalApplyingFor);
    if(journalApplyingFor == "-Select-")
    {
        journalApplyingFor = "None";
    }

    var journalType = document.getElementById("journal-form-type").value;
    var articleTitle = document.getElementById("journal-form-article-title").value;
    var listOfAuthors = document.getElementById("journal-form-list-of-authors").value;
    var authorsAffiliation = document.getElementById("journal-form-authors-affiliation").value;
    var nameOfJournal = document.getElementById("journal-form-name-of-journal").value;
    var publisher = document.getElementById("journal-form-publisher").value;
    var isbn = document.getElementById("journal-form-isbn").value;
    var doi = document.getElementById("journal-form-doi").value;
    var impactFactor = document.getElementById("journal-form-impact-factor").value;


    //Modal div id
    var container = document.getElementById("set-authors-form-jour");

    //console.log(listOfAuthors);

    var authorF = [];
    var authorL = [];
    var authorE = [];
    var length = listOfAuthors;

    for (i = 0; i<listOfAuthors; i++)
    {


        authorF.push(document.getElementById('get-author'+(i+1)+'-first-name-jour').value);
        authorL.push(document.getElementById('get-author'+(i+1)+'-last-name-jour').value);
        authorE.push(document.getElementById('get-author'+(i+1)+'-email-jour').value);
    
        
        //Heder for author info
        var h5 = document.createElement("h5");
        h5.appendChild(document.createTextNode("Author "+(i+1)+":"));
        h5.className = 'header-shape';
        container.appendChild(h5);

        //div1 for first name and last name's div and div11 and div12 for consequently both of them
        var div1 = document.createElement("div");
        var div11 = document.createElement("div");
        var div12 = document.createElement("div");

        div1.className = 'row';
        div11.className = 'col-sm-5';
        div12.className = 'col-sm-5';

        // Create an <input> element, set its type and name attributes
        var firstNameAu = document.createElement("input");
        firstNameAu.type = "text";
        firstNameAu.name = "authorFirstNameJour" + i;
        firstNameAu.className += 'form-control';
        firstNameAu.value = authorF[i];
            

        var lastNameAu = document.createElement("input");
        lastNameAu.type = "text";
        lastNameAu.name = "authorLastNameJour" + i;
        lastNameAu.className += 'form-control';
        lastNameAu.value = authorL[i];


        var email = document.createElement("input");
        email.type = "email";
        email.name = "authorEmailJour" + i;
        email.className += 'form-control col-sm-10';
        email.value = authorE[i];


        div11.appendChild(firstNameAu);
        div12.appendChild(lastNameAu);

        div1.appendChild(div11);
        div1.appendChild(div12);

        container.appendChild(div1);

        div11.appendChild(document.createElement("br"));
        div12.appendChild(document.createElement("br"));

        container.appendChild(email);
            
        // Append a line break 
        container.appendChild(document.createElement("br"));


    }
    
    document.getElementById("set-journal-applying-for").value = journalApplyingFor;
    document.getElementById("set-journal-type").value = journalType;
    document.getElementById("set-journal-article-title").value = articleTitle;
    document.getElementById("set-journal-list-of-authors").value = listOfAuthors;
    document.getElementById("set-journal-authors-affiliation").value = authorsAffiliation; 
    document.getElementById("set-name-of-journal").value = nameOfJournal;
    document.getElementById("set-journal-publisher").value = publisher;
    document.getElementById("set-journal-isbn").value = isbn;
    document.getElementById("set-journal-doi").value = doi;
    document.getElementById("set-journal-impaxt-factor").value = impactFactor;


}



function getConferenceForm()
{
    var prefix = document.getElementsByClassName("get-prefix");
    var firstName = document.getElementsByClassName("get-first-name");
    var lastName = document.getElementsByClassName("get-last-name");
    var designation = document.getElementsByClassName("get-designation");
    var department = document.getElementsByClassName("get-department");
    var claimType = document.getElementsByClassName("get-claim-type");

    document.getElementsByClassName("set-prefix")[1].setAttribute("value", prefix[0].value);
    document.getElementsByClassName("set-first-name")[1].setAttribute("value", firstName[0].value);
    document.getElementsByClassName("set-last-name")[1].setAttribute("value", lastName[0].value);
    document.getElementsByClassName("set-designation")[1].setAttribute("value", designation[0].value);
    document.getElementsByClassName("set-department")[1].setAttribute("value", department[0].value);
    document.getElementsByClassName("set-claim-type")[1].setAttribute("value", claimType[0].value);

    var conferenceApplyingFor = document.getElementById("conference-applying-for").value;
    //console.log(conferenceApplyingFor);
    if(conferenceApplyingFor == "-Select-")
    {
        conferenceApplyingFor = "None";
    }

    var conferenceType = document.getElementById("get-conference-type").value;
    var articleTitle = document.getElementById("get-conference-article-title").value;
    var listOfAuthors = document.getElementById("get-conference-list-of-authors").value;
    var authorsAffiliation = document.getElementById("get-conference-authors-affiliation").value;
    var nameOfConference = document.getElementById("get-name-of-conference").value;
    var venue = document.getElementById("get-conference-venue").value;
    var isbn = document.getElementById("get-conference-isbn").value;
    var doi = document.getElementById("get-conference-doi").value;



    //Modal div id
    var container = document.getElementById("set-authors-form-conf");

    console.log(listOfAuthors);

    var authorF = [];
    var authorL = [];
    var authorE = [];
    var length = listOfAuthors;

    for (i = 0; i<listOfAuthors; i++)
    {


        authorF.push(document.getElementById('get-author'+(i+1)+'-first-name-conf').value);
        authorL.push(document.getElementById('get-author'+(i+1)+'-last-name-conf').value);
        authorE.push(document.getElementById('get-author'+(i+1)+'-email-conf').value);
    
        
        //Heder for author info
        var h5 = document.createElement("h5");
        h5.appendChild(document.createTextNode("Author "+(i+1)+":"));
        h5.className = 'header-shape';
        container.appendChild(h5);

        //div1 for first name and last name's div and div11 and div12 for consequently both of them
        var div1 = document.createElement("div");
        var div11 = document.createElement("div");
        var div12 = document.createElement("div");

        div1.className = 'row';
        div11.className = 'col-sm-5';
        div12.className = 'col-sm-5';

        // Create an <input> element, set its type and name attributes
        var firstNameAu = document.createElement("input");
        firstNameAu.type = "text";
        firstNameAu.name = "authorFirstNameConf" + i;
        firstNameAu.className += 'form-control';
        firstNameAu.value = authorF[i];
            

        var lastNameAu = document.createElement("input");
        lastNameAu.type = "text";
        lastNameAu.name = "authorLastNameConf" + i;
        lastNameAu.className += 'form-control';
        lastNameAu.value = authorL[i];


        var email = document.createElement("input");
        email.type = "email";
        email.name = "authorEmailConf" + i;
        email.className += 'form-control col-sm-10';
        email.value = authorE[i];


        div11.appendChild(firstNameAu);
        div12.appendChild(lastNameAu);

        div1.appendChild(div11);
        div1.appendChild(div12);

        container.appendChild(div1);

        div11.appendChild(document.createElement("br"));
        div12.appendChild(document.createElement("br"));

        container.appendChild(email);
            
        // Append a line break 
        container.appendChild(document.createElement("br"));


    }



    document.getElementById("set-conference-applying-for").value = conferenceApplyingFor;
    document.getElementById("set-conference-type").value = conferenceType;
    document.getElementById("set-conference-article-title").value = articleTitle;
    document.getElementById("set-conference-list-of-authors").value = listOfAuthors;
    document.getElementById("set-conference-authors-affiliation").value = authorsAffiliation;
    document.getElementById("set-name-of-conference").value = nameOfConference;
    document.getElementById("set-conference-venue").value = venue;
    document.getElementById("set-conference-isbn").value = isbn;
    document.getElementById("set-conference-doi").value = doi;

}

function getBookForm()
{
    var prefix = document.getElementsByClassName("get-prefix");
    var firstName = document.getElementsByClassName("get-first-name");
    var lastName = document.getElementsByClassName("get-last-name");
    var designation = document.getElementsByClassName("get-designation");
    var department = document.getElementsByClassName("get-department");
    var claimType = document.getElementsByClassName("get-claim-type");

    document.getElementsByClassName("set-prefix")[2].setAttribute("value", prefix[0].value);
    document.getElementsByClassName("set-first-name")[2].setAttribute("value", firstName[0].value);
    document.getElementsByClassName("set-last-name")[2].setAttribute("value", lastName[0].value);
    document.getElementsByClassName("set-designation")[2].setAttribute("value", designation[0].value);
    document.getElementsByClassName("set-department")[2].setAttribute("value", department[0].value);
    document.getElementsByClassName("set-claim-type")[2].setAttribute("value", claimType[0].value);

    var bookApplyingFor = document.getElementById("book-applying-for").value;
    //console.log(bookApplyingFor);
    if(bookApplyingFor == "-Select-")
    {
        bookApplyingFor = "None";
    }


    var bookType = document.getElementById("get-book-type").value;
    var bookName = document.getElementById("get-book-name").value;
    var listOfAuthors = document.getElementById("get-book-list-of-authors").value;
    var authorsAffiliation = document.getElementById("get-book-authors-affiliation").value;
    var publisher = document.getElementById("get-book-publisher").value;
    var isbn = document.getElementById("get-book-isbn").value;



    //Modal div id
    var container = document.getElementById("set-authors-form-book");

    var authorF = [];
    var authorL = [];
    var authorE = [];

    for (i = 0; i<listOfAuthors; i++)
    {


        authorF.push(document.getElementById('get-author'+(i+1)+'-first-name-book').value);
        authorL.push(document.getElementById('get-author'+(i+1)+'-last-name-book').value);
        authorE.push(document.getElementById('get-author'+(i+1)+'-email-book').value);
    
        
        //Heder for author info
        var h5 = document.createElement("h5");
        h5.appendChild(document.createTextNode("Author "+(i+1)+":"));
        h5.className = 'header-shape';
        container.appendChild(h5);

        //div1 for first name and last name's div and div11 and div12 for consequently both of them
        var div1 = document.createElement("div");
        var div11 = document.createElement("div");
        var div12 = document.createElement("div");

        div1.className = 'row';
        div11.className = 'col-sm-5';
        div12.className = 'col-sm-5';

        // Create an <input> element, set its type and name attributes
        var firstNameAu = document.createElement("input");
        firstNameAu.type = "text";
        firstNameAu.name = "authorFirstNameBook" + i;
        firstNameAu.className += 'form-control';
        firstNameAu.value = authorF[i];
            

        var lastNameAu = document.createElement("input");
        lastNameAu.type = "text";
        lastNameAu.name = "authorLastNameBook" + i;
        lastNameAu.className += 'form-control';
        lastNameAu.value = authorL[i];


        var email = document.createElement("input");
        email.type = "email";
        email.name = "authorEmailBook" + i;
        email.className += 'form-control col-sm-10';
        email.value = authorE[i];


        div11.appendChild(firstNameAu);
        div12.appendChild(lastNameAu);

        div1.appendChild(div11);
        div1.appendChild(div12);

        container.appendChild(div1);

        div11.appendChild(document.createElement("br"));
        div12.appendChild(document.createElement("br"));

        container.appendChild(email);
            
        // Append a line break 
        container.appendChild(document.createElement("br"));


    }

    document.getElementById("set-book-applying-for").value = bookApplyingFor;
    document.getElementById("set-book-type").value = bookType;
    document.getElementById("set-book-name").value = bookName;
    document.getElementById("set-book-list-of-authors").value = listOfAuthors;
    document.getElementById("set-book-authors-affiliation").value = authorsAffiliation;
    document.getElementById("set-book-publisher").value = publisher;
    document.getElementById("set-book-isbn").value = isbn;
    
}

function getBookChapterForm()
{
    var prefix = document.getElementsByClassName("get-prefix");
    var firstName = document.getElementsByClassName("get-first-name");
    var lastName = document.getElementsByClassName("get-last-name");
    var designation = document.getElementsByClassName("get-designation");
    var department = document.getElementsByClassName("get-department");
    var claimType = document.getElementsByClassName("get-claim-type");

    document.getElementsByClassName("set-prefix")[3].setAttribute("value", prefix[0].value);
    document.getElementsByClassName("set-first-name")[3].setAttribute("value", firstName[0].value);
    document.getElementsByClassName("set-last-name")[3].setAttribute("value", lastName[0].value);
    document.getElementsByClassName("set-designation")[3].setAttribute("value", designation[0].value);
    document.getElementsByClassName("set-department")[3].setAttribute("value", department[0].value);
    document.getElementsByClassName("set-claim-type")[3].setAttribute("value", claimType[0].value);

    var bookChapterApplyingFor = document.getElementById("bookchapter-applying-for").value;
    //console.log(bookChapterApplyingFor);
    if(bookChapterApplyingFor == "-Select-")
    {
        bookChapterApplyingFor = "None";
    }


    var bookChapterType = document.getElementById("get-book-chapter-type").value;
    var articleTitle = document.getElementById("get-book-chapter-article-title").value;
    var listOfAuthors = document.getElementById("get-book-chapter-list-of-authors").value;
    var authorsAffiliation = document.getElementById("get-book-chapter-authors-affiliation").value;
    var bookChapterTitle = document.getElementById("get-book-chapter-book-title").value;
    var publisher = document.getElementById("get-book-chapter-publisher").value;
    var isbn = document.getElementById("get-book-chapter-isbn").value;
    var doi = document.getElementById("get-book-chapter-doi").value;



    //Modal div id
    var container = document.getElementById("set-authors-form-bookchapter");

    //console.log(listOfAuthors);

    var authorF = [];
    var authorL = [];
    var authorE = [];
    var length = listOfAuthors;

    for (i = 0; i<listOfAuthors; i++)
    {


        authorF.push(document.getElementById('get-author'+(i+1)+'-first-name-bookchapter').value);
        authorL.push(document.getElementById('get-author'+(i+1)+'-last-name-bookchapter').value);
        authorE.push(document.getElementById('get-author'+(i+1)+'-email-bookchapter').value);
    
        
        //Heder for author info
        var h5 = document.createElement("h5");
        h5.appendChild(document.createTextNode("Author "+(i+1)+":"));
        h5.className = 'header-shape';
        container.appendChild(h5);

        //div1 for first name and last name's div and div11 and div12 for consequently both of them
        var div1 = document.createElement("div");
        var div11 = document.createElement("div");
        var div12 = document.createElement("div");

        div1.className = 'row';
        div11.className = 'col-sm-5';
        div12.className = 'col-sm-5';

        // Create an <input> element, set its type and name attributes
        var firstNameAu = document.createElement("input");
        firstNameAu.type = "text";
        firstNameAu.name = "authorFirstNameBookChapter" + i;
        firstNameAu.className += 'form-control';
        firstNameAu.value = authorF[i];
            

        var lastNameAu = document.createElement("input");
        lastNameAu.type = "text";
        lastNameAu.name = "authorLastNameBookChapter" + i;
        lastNameAu.className += 'form-control';
        lastNameAu.value = authorL[i];


        var email = document.createElement("input");
        email.type = "email";
        email.name = "authorEmailBookChapter" + i;
        email.className += 'form-control col-sm-10';
        email.value = authorE[i];


        div11.appendChild(firstNameAu);
        div12.appendChild(lastNameAu);

        div1.appendChild(div11);
        div1.appendChild(div12);

        container.appendChild(div1);

        div11.appendChild(document.createElement("br"));
        div12.appendChild(document.createElement("br"));

        container.appendChild(email);
            
        // Append a line break 
        container.appendChild(document.createElement("br"));


    }



    document.getElementById("set-bookchapter-applying-for").value = bookChapterApplyingFor;
    document.getElementById("set-book-chapter-type").value = bookChapterType;
    document.getElementById("set-book-chapter-article-title").value = articleTitle;
    document.getElementById("set-book-chapter-list-of-authors").value = listOfAuthors;
    document.getElementById("set-book-chapter-authors-affiliation").value = authorsAffiliation;
    document.getElementById("set-book-chapter-book-title").value = bookChapterTitle;
    document.getElementById("set-book-chapter-publisher").value = publisher;
    document.getElementById("set-book-chapter-isbn").value = isbn;
    document.getElementById("set-book-chapter-doi").value = doi;
    
}


function getResearchForm()
{
    var prefix = document.getElementsByClassName("get-prefix");
    var firstName = document.getElementsByClassName("get-first-name");
    var lastName = document.getElementsByClassName("get-last-name");
    var designation = document.getElementsByClassName("get-designation");
    var department = document.getElementsByClassName("get-department");
    var claimType = document.getElementsByClassName("get-claim-type");

    document.getElementsByClassName("set-prefix")[4].setAttribute("value", prefix[0].value);
    document.getElementsByClassName("set-first-name")[4].setAttribute("value", firstName[0].value);
    document.getElementsByClassName("set-last-name")[4].setAttribute("value", lastName[0].value);
    document.getElementsByClassName("set-designation")[4].setAttribute("value", designation[0].value);
    document.getElementsByClassName("set-department")[4].setAttribute("value", department[0].value);
    document.getElementsByClassName("set-claim-type")[4].setAttribute("value", claimType[0].value);

    var researchApplyingFor = document.getElementById("research-applying-for").value;
    //console.log(researchApplyingFor);
    if(researchApplyingFor == "-Select-")
    {
        researchApplyingFor = "None";
    }

    var projectName = document.getElementById("get-project-name").value;
    var projectStatusPi = document.getElementById("get-project-status-pi").value;
    var projectFundingAuthority = document.getElementById("get-project-funding-authority").value;
    var projectFundingAmount = document.getElementById("get-project-funding-amount").value;
    var projectDateOfAward = document.getElementById("get-project-date-of-award").value;
    var projectStatus = document.getElementById("get-project-status").value;


    document.getElementById("set-research-applying-for").value = researchApplyingFor;
    document.getElementById("set-project-name").value = projectName;
    document.getElementById("set-project-status-pi").value = projectStatusPi;
    document.getElementById("set-project-funding-authority").value = projectFundingAuthority;
    document.getElementById("set-project-funding-amount").value = projectFundingAmount;
    document.getElementById("set-project-date-of-award").value = projectDateOfAward;
    document.getElementById("set-project-status").value = projectStatus;
    
}


function checkUser(usercheck)
{
    var username = $('#username').val();
    var password = $('#password').val();

    if (!username)
    {
        $('#usercheck').show();
        $('#usercheck').css('color', '#CC0000');
        $('#usercheck').html('Please enter user name.');
        $('#username').focus();
        $('#username').addClass('error');
        setTimeout("$('#usercheck').fadeOut(); ", 3000);
    }
    else if(!password)
    {
        $('#username').removeClass('error');
        $('#passwordcheck').show();
        $('#passwordcheck').css('color', '#CC0000');
        $('#passwordcheck').html('Please enter password.');
        $('#password').focus();
        $('#password').addClass('error');
        setTimeout("$('#passwordcheck').fadeOut(); ", 3000);
    }
    else
    {
        $('form#loginform').submit();
    }
}