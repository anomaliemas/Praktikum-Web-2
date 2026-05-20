<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    :root {
        --biru-utama: #0056b3;
        --biru-tua: #003366;
        --biru-muda: #e6f0fa;
        --kuning-aksen: #ffcc00;
        --abu-latar: #f4f6f9;
        --putih: #ffffff;
        --border-radius: 8px;
        --shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        --shadow-hover: 0 4px 12px rgba(0, 0, 0, 0.12);
        --transition: all 0.2s ease;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: var(--abu-latar);
        color: var(--biru-tua);
        font-family: 'Inter', Arial, sans-serif;
        padding: 32px;
        min-height: 100vh;
        line-height: 1.6;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    h2 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--biru-tua);
        margin-bottom: 24px;
        padding-bottom: 12px;
        border-bottom: 3px solid var(--kuning-aksen);
        display: inline-block;
    }

    .nav {
        background: var(--putih);
        padding: 16px 24px;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        margin-bottom: 24px;
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        align-items: center;
    }

    .nav-title {
        font-weight: 600;
        color: var(--biru-tua);
        margin-right: auto;
        font-size: 1.1rem;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-top: 16px;
        background-color: var(--putih);
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: var(--shadow);
    }

    th {
        background: linear-gradient(135deg, var(--biru-utama) 0%, var(--biru-tua) 100%);
        color: var(--putih);
        padding: 14px 16px;
        text-align: left;
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    td {
        padding: 14px 16px;
        border-bottom: 1px solid #eee;
        font-size: 0.9rem;
        vertical-align: middle;
    }

    tbody tr:hover {
        background-color: var(--biru-muda);
    }

    tr:nth-child(even) {
        background-color: #fafbfc;
    }

    .btn {
        background: linear-gradient(135deg, var(--biru-utama) 0%, #004494 100%);
        color: var(--putih);
        padding: 10px 18px;
        text-decoration: none;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.875rem;
        font-weight: 500;
        transition: var(--transition);
        box-shadow: 0 2px 4px rgba(0, 86, 179, 0.2);
    }

    .btn:hover {
        background: linear-gradient(135deg, var(--kuning-aksen) 0%, #e6b800 100%);
        color: var(--biru-tua);
        transform: translateY(-1px);
        box-shadow: var(--shadow-hover);
    }

    .btn-secondary {
        background: var(--putih);
        color: var(--biru-utama);
        border: 2px solid var(--biru-utama);
        box-shadow: none;
    }

    .btn-secondary:hover {
        background: var(--biru-utama);
        color: var(--putih);
    }

    .btn-danger {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #ff4757 0%, #dc3545 100%);
        color: var(--putih);
    }

    .btn-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    form {
        background-color: var(--putih);
        padding: 32px;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        max-width: 500px;
        border-top: 4px solid var(--biru-utama);
    }

    label {
        display: block;
        font-weight: 600;
        color: var(--biru-tua);
        margin-bottom: 6px;
        font-size: 0.875rem;
    }

    input[type=text], input[type=date], input[type=number], textarea, select, input[type=datetime-local] {
        width: 100%;
        padding: 12px 14px;
        margin-bottom: 20px;
        border: 2px solid #e0e0e0;
        border-radius: 6px;
        font-size: 0.9rem;
        font-family: inherit;
        background-color: #fafbfc;
    }

    input:focus, textarea:focus, select:focus {
        outline: none;
        border-color: var(--biru-utama);
        background-color: var(--putih);
        box-shadow: 0 0 0 3px rgba(0, 86, 179, 0.1);
    }

    textarea {
        min-height: 100px;
        resize: vertical;
    }

    .badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .badge-active {
        background-color: #d4edda;
        color: #155724;
    }

    .badge-inactive {
        background-color: #f8d7da;
        color: #721c24;
    }

    .empty-state {
        text-align: center;
        padding: 48px 24px;
        color: #666;
    }

    @media (max-width: 768px) {
        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
        .nav {
            flex-direction: column;
            align-items: stretch;
        }
    }
</style>
