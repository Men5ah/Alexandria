//------------------------------------------------------------------------------------------------------------------
// Get references to the form, input field, search results container, and pagination buttons
const searchForm = document.getElementById('searchForm');
const searchInput = document.getElementById('search');
const searchResults = document.getElementById('searchResults');
const prevButton = document.getElementById('prevButton');
const nextButton = document.getElementById('nextButton');
let pageNumber = 1;

// Base API URL
const apiUrl = 'https://gutendex.com';

// Global variables to store next and previous page URLs
let nextPageUrl = null;
let previousPageUrl = null;

let selectedBookTitle;
let selectedAuthor;
let selectedGutenbergID;

// Function to set selected book information
function setSelectedBookInfo(title, author, gutenbergID) {
    selectedBookTitle = title;
    selectedAuthor = author;
    selectedGutenbergID = gutenbergID;
}

// Function to fetch and display search results
async function fetchAndDisplaySearchResults(pageNumber, query) {
    try {
        let url;
        if (pageNumber === 1) {
            // Construct the URL for the first page
            url = `${apiUrl}/books?search=${encodeURIComponent(query)}`;
        } else {
            // Construct the URL with the specified page number
            url = `${apiUrl}/books?page=${pageNumber}&search=${encodeURIComponent(query)}`;
        }

        // Make a search request based on the constructed URL
        const response = await fetch(url);
        const data = await response.json();

        // Update next and previous page URLs
        nextPageUrl = data.next;
        previousPageUrl = data.previous;

        // Display search results
        displaySearchResults(data);
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}


// Function to display search results on the page
function displaySearchResults(data) {
    // Clear previous search results
    searchResults.innerHTML = '';

    // Process the search results and display them on the page
    const books = data.results;
    books.forEach((book) => {
        // Create a container div for each book
        const bookContainer = document.createElement('div');
        bookContainer.classList.add('book');

        // Create an image element for the book cover
        if (book.formats['image/jpeg']) {
            const coverImage = document.createElement('img');
            coverImage.src = book.formats['image/jpeg'];
            coverImage.alt = book.title;
            bookContainer.appendChild(coverImage);
        }

        // Create an h2 element for the book title
        const titleElement = document.createElement('h2');
        titleElement.textContent = book.title;
        bookContainer.appendChild(titleElement);

        // Create a paragraph element for the author(s)
        const authorElement = document.createElement('p');
        if (book.authors && book.authors.length > 0) {
            // Extract author names from the authors array
            const authorNames = book.authors.map(author => author.name);
            authorElement.textContent = `Author(s): ${authorNames.join(', ')}`;
        } else {
            authorElement.textContent = 'Author(s): Unknown';
        }
        bookContainer.appendChild(authorElement);

        // Create a link element for the book on Project Gutenberg
        const linkElement = document.createElement('a');
        linkElement.textContent = 'Read on Project Gutenberg';
        linkElement.href = `https://www.gutenberg.org/ebooks/${book.id}`;
        linkElement.target = '_blank'; // Open link in new tab
        bookContainer.appendChild(linkElement);

        const addtoReadingList = document.createElement('button');
        addtoReadingList.textContent = 'Add to Reading List';
        addtoReadingList.onclick = () => {

            window.location.href = '../views/addtoreadinglist.php?data='+encodeURIComponent(JSON.stringify({
                "book": book.title,
                "author": book.authors[0].name,
                "bookID":book.id
            }));
        };
        bookContainer.appendChild(addtoReadingList);
        

        // Append the book container to the search results container
        searchResults.appendChild(bookContainer);
    });

    // Show or hide pagination buttons based on next and previous page URLs
    if (nextPageUrl) {
        nextButton.style.display = 'inline-block';
    } else {
        nextButton.style.display = 'none';
    }

    if (previousPageUrl) {
        prevButton.style.display = 'inline-block';
    } else {
        prevButton.style.display = 'none';
    }
}

// Event listener for form submission
searchForm.addEventListener('submit', (e) => {
    e.preventDefault(); // Prevent page reload

    const userQuery = searchInput.value.trim(); // Get user's search query

    // Fetch and display search results for the first page
    fetchAndDisplaySearchResults(pageNumber, userQuery);
});

// Event listener for next button click
nextButton.addEventListener('click', () => {
    if (nextPageUrl) {
        // Increment pageNumber
        pageNumber++;

        // Fetch and display search results for the next page
        fetchAndDisplaySearchResults(pageNumber, searchInput.value.trim());
    }
});

// Event listener for previous button click
prevButton.addEventListener('click', () => {
    if (previousPageUrl && pageNumber > 1) {
        pageNumber--;
        fetchAndDisplaySearchResults(pageNumber, searchInput.value.trim());
    }
});



// ajax function
// function sendRequest(data){
//     const ajax = new XMLHttpRequest();

//     ajax.onreadystatechange = function(){
//         if(this.readyState === 4 && this.status === 200){
//             // window.location.href = '../views/addtoreadinglist.php';
//         }
//     }

//     ajax.open("POST", "../views/addtoreadinglist.php", true);
//     ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     ajax.send(data);
// }