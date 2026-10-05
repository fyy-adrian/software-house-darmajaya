</div>
</main>

<script>
(function () {
    var sidebar = document.getElementById('sidebar');
    var overlay = document.getElementById('sidebar-overlay');
    var btn = document.getElementById('sidebar-toggle');
    function toggle(open) {
        sidebar.classList.toggle('-translate-x-full', !open);
        overlay.classList.toggle('hidden', !open);
    }
    btn.addEventListener('click', function () { toggle(sidebar.classList.contains('-translate-x-full')); });
    overlay.addEventListener('click', function () { toggle(false); });
})();
</script>
</body>
</html>
