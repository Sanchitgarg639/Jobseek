function searchfun() {
    // Get the search input value and convert it to uppercase for case-insensitive comparison
    let filter = document.getElementById('myInput').value.toUpperCase();

    // Get all job cards inside the job-container
    let jobContainers = document.getElementsByClassName('job-container');

    // Loop through all job cards and check if the title matches the search input
    for (let i = 0; i < jobContainers.length; i++) {
        let jobCard = jobContainers[i].getElementsByClassName('job-card')[0];
        let title = jobCard.getElementsByTagName('h3')[0];

        if (title) {
            let txtValue = title.textContent || title.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                jobContainers[i].style.display = ""; // Show matching job cards
            } else {
                jobContainers[i].style.display = "none"; // Hide non-matching job cards
            }
        }
    }
}