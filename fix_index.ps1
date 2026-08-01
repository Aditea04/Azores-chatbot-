$file = 'f:\Azores\index.php'
$lines = [System.IO.File]::ReadAllLines($file, [System.Text.Encoding]::UTF8)

Write-Host "Total lines: $($lines.Count)"
Write-Host "Line 764: $($lines[763])"
Write-Host "Line 765: $($lines[764])"
Write-Host "Line 1011: $($lines[1010])"
Write-Host "Line 1012: $($lines[1011])"

# Keep lines 1-764 (indices 0-763)
$keepBefore = $lines[0..763]

# Keep lines 1012-end (indices 1011..end) which is the PHP footer
$keepAfter = $lines[1011..($lines.Count - 1)]

# New marquee JS to insert
$newJS = @'

    setInterval(function() {
        currentHeroBgIndex = (currentHeroBgIndex + 1) % heroBgImages.length;
        heroSliderElem.style.backgroundImage = "url('" + heroBgImages[currentHeroBgIndex] + "')";
    }, 5000);

    // Specialized Marquee Logic
    var specTrack = document.getElementById('specMarqueeTrack');
    var specWrapper = document.getElementById('specMarqueeWrapper');
    if (specTrack && specWrapper) {
        // Freeze pill widths before cloning
        Array.from(specTrack.children).forEach(function(item) {
            var c = item.querySelector('.spec-content');
            if (c) c.style.width = c.offsetWidth + 'px';
        });

        // Clone items twice for infinite loop buffer (3 sets total)
        var origItems = Array.from(specTrack.children);
        for (var i = 0; i < 2; i++) {
            origItems.forEach(function(item) { specTrack.appendChild(item.cloneNode(true)); });
        }

        var cycleWidth = 1824;
        var pos = -cycleWidth;
        var AUTO_SPEED = 1.0;
        var momentum = 0;
        var FRICTION = 0.90;
        var MIN_VEL = 0.3;

        var isDown = false, isDragging = false;
        var startX = 0, startPos = 0, prevX = 0, dragVel = 0;

        function getX(e) { return e.touches ? e.touches[0].clientX : e.clientX; }

        function onStart(e) {
            isDown = true; isDragging = false; momentum = 0;
            startX = getX(e); prevX = startX; startPos = pos;
        }
        function onMove(e) {
            if (!isDown) return;
            var cx = getX(e);
            var dx = cx - startX;
            if (e.touches) {
                var dy = e.touches[0].clientY - (startPos);
                if (Math.abs(dx) > 6 && e.cancelable) e.preventDefault();
            }
            if (Math.abs(dx) > 6) isDragging = true;
            if (isDragging) { dragVel = cx - prevX; prevX = cx; pos = startPos + dx; }
        }
        function onEnd() {
            if (!isDown) return; isDown = false;
            if (isDragging) momentum = dragVel;
            setTimeout(function() { isDragging = false; }, 50);
        }

        specWrapper.addEventListener('mousedown', onStart);
        window.addEventListener('mousemove', onMove);
        window.addEventListener('mouseup', onEnd);
        specWrapper.addEventListener('touchstart', onStart, { passive: true });
        specWrapper.addEventListener('touchmove', onMove, { passive: false });
        specWrapper.addEventListener('touchend', onEnd);
        specTrack.addEventListener('click', function(e) {
            if (isDragging) { e.preventDefault(); e.stopPropagation(); }
        }, true);

        function updateActive() {
            var wc = specWrapper.getBoundingClientRect().left + specWrapper.offsetWidth / 2;
            var all = Array.from(specTrack.children);
            var ranked = all.map(function(el) {
                return { el: el, d: Math.abs(el.getBoundingClientRect().left + el.offsetWidth / 2 - wc) };
            }).sort(function(a, b) { return a.d - b.d; });
            all.forEach(function(el) { el.classList.remove('active'); });
            ranked.slice(0, 3).forEach(function(x) { x.el.classList.add('active'); });
        }

        function animate() {
            if (!isDragging) {
                if (Math.abs(momentum) > MIN_VEL) {
                    pos += momentum;
                    momentum *= FRICTION;
                } else {
                    momentum = 0;
                    pos -= AUTO_SPEED;
                }
            }
            if (pos <= -cycleWidth * 2) pos += cycleWidth;
            else if (pos >= 0) pos -= cycleWidth;
            specTrack.style.transform = 'translateX(' + pos + 'px)';
            updateActive();
            requestAnimationFrame(animate);
        }
        animate();
    }
});
</script>
'@

# Combine and write
$newLines = $keepBefore + $newJS.Split("`n") + $keepAfter

[System.IO.File]::WriteAllLines($file, $newLines, [System.Text.Encoding]::UTF8)
Write-Host "Done. New total lines: $($newLines.Count)"
