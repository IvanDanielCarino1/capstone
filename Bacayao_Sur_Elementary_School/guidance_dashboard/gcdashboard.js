document.addEventListener("DOMContentLoaded", function () {
    const filterIcons = {
        name: document.getElementById("name-filter-icon"),
        star: document.getElementById("star-filter-icon"),
        grade: document.getElementById("grade-filter-icon"),
        section: document.getElementById("section-filter-icon"),
    };

    const filterPopup = document.getElementById("filter-popup");
    const filterChoices = document.getElementById("filter-choices");
    let activeFilter = null; 

    for (let category in filterIcons) {
        filterIcons[category].addEventListener("click", function (e) {
            e.stopPropagation(); 

            if (activeFilter === category) {
                filterPopup.style.display = "none";
                activeFilter = null;
                return;
            }

            filterChoices.innerHTML = "";

            switch (category) {
                case "name":
                    addChoices(["A-Z", "Z-A"]);
                    break;
                case "star":
                    addChoices(["Academic", "Behavioral", "Psychological"]);
                    break;
                case "grade":
                    addChoices(["Grade 1", "Grade 2", "Grade 3"]);
                    break;
                case "section":
                    addChoices(["Section 1", "Section 2", "Section 3"]);
                    break;
            }

            const iconRect = filterIcons[category].getBoundingClientRect();
            let leftPosition = iconRect.left;
            let topPosition = iconRect.bottom;


            if (leftPosition + filterPopup.offsetWidth > window.innerWidth) {
                leftPosition = window.innerWidth - filterPopup.offsetWidth;
            }

            if (topPosition + filterPopup.offsetHeight > window.innerHeight) {
                topPosition = window.innerHeight - filterPopup.offsetHeight;
            }

            filterPopup.style.left = leftPosition + "px";
            filterPopup.style.top = topPosition + "px";

            filterPopup.style.display = "block";
            activeFilter = category;
        });
    }

    window.addEventListener("click", function (e) {
        if (e.target !== filterPopup && e.target !== filterIcons.name && e.target !== filterIcons.star && e.target !== filterIcons.grade && e.target !== filterIcons.section) {
            filterPopup.style.display = "none";
            activeFilter = null;
        }
    });

    function addChoices(choices) {
        choices.forEach(choice => {
            const li = document.createElement("li");
            li.textContent = choice;
            filterChoices.appendChild(li);
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const menuIcon = document.getElementById("menu-icon");
    const menuPopup = document.getElementById("menu-popup");

    menuIcon.addEventListener("click", function (e) {
        menuPopup.style.display = menuPopup.style.display === "none" ? "block" : "none";
        e.stopPropagation();
    });

    window.addEventListener("click", function (e) {
        if (e.target !== menuPopup && e.target !== menuIcon) {
            menuPopup.style.display = "none";
        }
    });
});


function toggleDropdown() {
    var dropdownContent = document.getElementById("dropdownContent");
    dropdownContent.classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.logout-icon')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}