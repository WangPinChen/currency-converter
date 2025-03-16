<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>APIs</title>
    <script src="https://unpkg.com/@stoplight/elements@8.3/web-components.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@stoplight/elements@8.3/styles.min.css">
</head>

<body>

    <elements-api id="docs" router="hash" layout="sidebar"></elements-api>

    <script>
        (async () => {
            const docs = document.getElementById('docs');
            const yamlData = await fetch("{{ url('/api-doc/yaml') }}").then(res => res.text());
            docs.apiDescriptionDocument = yamlData;
        })();
    </script>

</body>

</html>
