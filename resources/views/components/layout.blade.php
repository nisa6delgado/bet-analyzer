<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bet Analyzer</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="bg-slate-900 min-h-screen p-4 md:p-8 text-slate-200">
        <div class="max-w-7xl mx-auto mb-8 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h2 class="text-3xl font-extrabold text-white tracking-tighter">Bet Analyzer</h2>
            </div>
            
            <div class="flex p-1.5 bg-slate-800 rounded-xl border border-slate-700 shadow-2xl">
                <button class="flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white rounded-lg text-sm font-bold uppercase tracking-tight transition shadow-lg">
                    <span>⚽</span>
                    <span>Fútbol</span>
                </button>
                
                <button class="flex items-center gap-2 px-5 py-2.5 text-slate-400 hover:text-white hover:bg-slate-700/50 rounded-lg text-sm font-bold uppercase tracking-tight transition">
                    <span>🏀</span>
                    <span>Baloncesto</span>
                </button>
                
                <button class="flex items-center gap-2 px-5 py-2.5 text-slate-400 hover:text-white hover:bg-slate-700/50 rounded-lg text-sm font-bold uppercase tracking-tight transition">
                    <span>⚾</span>
                    <span>Béisbol</span>
                </button>
            </div>
        </div>

        <div class="max-w-7xl mx-auto bg-slate-800 rounded-2xl border border-slate-700 shadow-2xl overflow-hidden">
            <div class="overflow-x-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>