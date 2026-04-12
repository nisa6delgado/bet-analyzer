<x-layout>
    <table class="w-full text-left min-w-[950px]">
        <thead>
            <tr class="border-b border-slate-700 bg-slate-800/50">
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-slate-500 tracking-widest">Horario / Liga</th>
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-slate-500 tracking-widest">Enfrentamiento</th>
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-slate-500 tracking-widest text-center">Over 2.5</th>
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-slate-500 tracking-widest text-center">Ambos Marcan</th>
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-slate-500 tracking-widest text-center">Over 1.5</th>
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-blue-400 tracking-widest text-center text-glow-blue">Pick Recomendado</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-slate-700/50">
            @foreach($matches as $match)
                <tr class="hover:bg-slate-700/30 transition-all group">
                    <td class="px-6 py-6">
                        <div class="flex flex-col">
                            <span class="font-mono text-xl font-bold text-white">{{ new DateTime($match->fixture->date)->format('h:ia') }}</span>

                            <span class="flex text-[10px] text-blue-400 font-bold uppercase mt-1">
                                <img class="h-3 mr-1" src="{{ $match->league->flag ?? $match->league->logo }}" alt="{{ $match->league->name }}">

                                {{ $match->league->name }}
                            </span>
                        </div>
                    </td>
                    
                    <td class="px-6 py-6">
                        <div class="flex items-center gap-4">
                            <div class="flex -space-x-3">
                                <img class="w-11 h-11 rounded-full bg-slate-900 border-2 border-slate-800 group-hover:scale-110 transition-transform" src="{{ $match->teams->home->logo }}" alt="{{ $match->teams->home->name }}">
                                <img class="w-11 h-11 rounded-full bg-slate-900 border-2 border-slate-800 group-hover:scale-110 transition-transform" src="{{ $match->teams->away->logo }}" alt="{{ $match->teams->away->name }}">
                            </div>

                            <div>
                                <div class="font-bold text-white text-lg leading-tight">{{ $match->teams->home->name }} vs {{ $match->teams->away->name }}</div>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-6 text-center">
                        <span class="text-xl font-mono font-black text-emerald-400">68%</span>
                    </td>

                    <td class="px-6 py-6 text-center">
                        <span class="text-xl font-mono font-black text-slate-400">51%</span>
                    </td>

                    <td class="px-6 py-6 text-center">
                        <span class="text-xl font-mono font-black text-emerald-400 text-glow">89%</span>
                    </td>
                    
                    <td class="px-6 py-6 text-center">
                        <div class="inline-block bg-blue-500/10 text-blue-400 border border-blue-500/30 px-4 py-2 rounded-lg text-[11px] font-black uppercase tracking-tighter">
                            Local (DNB)
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>