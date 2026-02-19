<div id="loader" aria-live="polite" aria-label="Loading">
    <div class="spinner"></div>
</div>
<style>
    #loader {
        position: fixed;
        inset: 0;
        background: rgba(255, 255, 255, 0.85);
        display: grid;
        place-items: center;
        z-index: 9999;
    }

    .spinner {
        width: 48px;
        height: 48px;
        border: 5px solid #e5e7eb;
        border-top-color: #0ea5a4;
        border-radius: 999px;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }
</style>
<script>
    window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        if (loader) {
            loader.remove();
        }
    });
</script>
