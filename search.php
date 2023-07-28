<!DOCTYPE html>
<html>
<head>
    <title>Patient Search</title>
</head>
<body>
    <?php
    session_start();
    include "db_conn.php";

    if (isset($_SESSION['userPass']) && isset($_SESSION['userId'])) {
        ?>

        <h2>Patient Search</h2>
        <form action="search.php" method="GET">
            <input type="text" name="query" id="searchQuery" placeholder="Search patient by name...">
            <input type="submit" value="Search">
        </form>

        <div id="searchSuggestions"></div>

        <script>
            // Function to fetch search suggestions
            function fetchSuggestions() {
                const input = document.getElementById("searchQuery").value;
                if (input.length > 0) {
                    const xhr = new XMLHttpRequest();
                    xhr.open("GET", "search_suggestions.php?query=" + input, true);
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            const suggestions = JSON.parse(xhr.responseText);
                            let suggestionsHTML = "";
                            suggestions.forEach(function(suggestion) {
                                suggestionsHTML += "<p>" + suggestion + "</p>";
                            });
                            document.getElementById("searchSuggestions").innerHTML = suggestionsHTML;
                        }
                    };
                    xhr.send();
                } else {
                    document.getElementById("searchSuggestions").innerHTML = "";
                }
            }

            // Attach event listener to the search input
            document.getElementById("searchQuery").addEventListener("input", fetchSuggestions);
        </script>

    <?php
    } else {
        header("Location: index.php");
        exit();
    }
    ?>
</body>
</html>

