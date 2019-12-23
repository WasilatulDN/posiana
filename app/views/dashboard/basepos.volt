<!DOCTYPE html>
<html>
<head>
    {% include 'dashboard/header.volt' %}
    <title>{% block title %}{% endblock %} - Posiana</title>
</head>
<body>
{% include 'dashboard/navbar.volt' %}
{% include 'dashboard/sidebarpos.volt' %}
<div class="dashboard-main">
    {% block content %}{% endblock %}
</div>
{% include'dashboard/footer.volt' %}
</body>
</html>