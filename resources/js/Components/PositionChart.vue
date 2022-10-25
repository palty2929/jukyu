<script setup>
import 'chart.js/auto'
import { Bar } from 'vue-chartjs'
import { usePage } from '@inertiajs/inertia-vue3'

const labels = usePage().props.value.segment_labels
const chartData = {
    labels: labels,
    datasets: [
        {
            type: 'line',
            label: '需要想定値',
            borderColor: 'rgb(85,85,85)',
            data: [
                55440, 53298, 51350, 50642, 49860, 48977, 48744, 47760, 48318, 48621, 49123, 50647, 53346, 57043, 62610,
                69162, 76742, 88289, 97228, 100726, 101916, 104359, 105116, 103820, 98236, 98674, 105283, 105893,
                105895, 105330, 103917, 103916, 103193, 101317, 98683, 95114, 89996, 86519, 82848, 79476, 76223, 73545,
                70571, 67639, 67526, 64873, 61713, 58861
            ]
        },
        {
            label: '相対電源',
            backgroundColor: 'rgb(79,129,189',
            data: [
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10582, 20862, 24884, 26253, 29062, 29933, 28443,
                22021, 22525, 30125, 30826, 30829, 30179, 28554, 28553, 27721, 25564, 22535, 18431, 12545, 8546, 4325,
                447, 0, 0, 0, 0, 0, 0, 0, 0
            ]
        },
        {
            label: 'JBU',
            backgroundColor: 'rgb(155,187,89)',
            data: [
                63756, 61292, 59052, 58238, 57339, 56323, 56055, 54924, 55565, 55914, 56491, 58244, 61347, 65599, 72001,
                79536, 88253, 90950, 90950, 90950, 90950, 90950, 90950, 90950, 90950, 90950, 90950, 90950, 90950, 90950,
                90950, 90950, 90950, 90950, 90950, 90950, 90950, 90950, 90950, 90950, 87656, 84576, 81156, 77784, 77654,
                74603, 70969, 67690
            ]
        },
        {
            label: 'スポット売',
            backgroundColor: 'rgb(217,150,148)',
            data: [
                -47894, -47908, -47909, -47909, -47907, -47887, -47894, -47911, -47909, -47909, -47907, -47887, -47938,
                -48197, -48644, -49107, -49606, -39490, -29641, -25964, -24780, -22050, -21216, -22626, -28852, -28212,
                -20268, -19243, -18919, -19172, -20318, -19900, -20364, -22351, -25372, -29456, -35349, -39365, -43584,
                -47462, -47907, -47887, -47894, -47911, -47909, -47909, -47907, -47887
            ]
        }
    ]
}

const chartOptions = {
    maintainAspectRatio: false,
    plugins: {
        legend: {
            position: 'bottom'
        }
    },
    scales: {
        x: {
            grid: {
                display: false
            },
            stacked: true
        },
        y: {
            stacked: true
        }
    },
    elements: {
        point: {
            radius: 0
        }
    }
}

const bgs = [
    {
        code: 'LA123',
        name: '電源A',
        data: [
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8, 8, 32, 67, 118, 132, 148, 136, 163, 156, 137, 123, 127, 115,
            107, 72, 11, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0
        ]
    },
    {
        code: 'LA563',
        name: '電源B',
        data: [
            2094, 2108, 2109, 2109, 2107, 2087, 2094, 2111, 2109, 2109, 2107, 2087, 2094, 2111, 2109, 2109, 2107, 2087,
            2094, 2111, 2109, 2109, 2107, 2089, 2094, 2111, 2109, 2109, 2107, 2087, 2094, 2111, 2109, 2109, 2107, 2087,
            2094, 2111, 2109, 2109, 2107, 2087, 2094, 2111, 2109, 2109, 2107, 2087
        ]
    },
    {
        code: 'LA123',
        name: '電源C',
        data: [
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 286, 727, 1190, 1667, 2118, 2491, 2805, 2976, 3067, 3079, 3024,
            2842, 2703, 2357, 2045, 1734, 1392, 967, 537, 171, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0
        ]
    },
    {
        code: 'LA563',
        name: '電源D',
        data: [
            3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800,
            3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800,
            3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800, 3800
        ]
    }
]
</script>

<template>
    <div class="flex gap-8 items-center">
        <input type="date" class="input input-bordered" />
        <div class="tabs">
            <a class="tab tab-bordered">北海道</a>
            <a class="tab tab-bordered tab-active">東北</a>
            <a class="tab tab-bordered">東京</a>
            <a class="tab tab-bordered">中部</a>
            <a class="tab tab-bordered">北陸</a>
            <a class="tab tab-bordered">関西</a>
            <a class="tab tab-bordered">中国</a>
            <a class="tab tab-bordered">四国</a>
            <a class="tab tab-bordered">九州</a>
        </div>
    </div>

    <div class="mt-8 max-w-7xl">
        <!-- Keep-alive必須 -->
        <Bar :chartData="chartData" :chartOptions="chartOptions" :height="650" />
    </div>

    <div class="mt-8 max-w-7xl overflow-x-scroll">
        <table class="table table-zebra table-compact w-full">
            <thead>
                <tr>
                    <th>BGコード</th>
                    <th>BG名</th>
                    <th v-for="(label, index) in labels" :key="index">{{ label }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(bg, index) in bgs" :key="index">
                    <td>{{ bg.code }}</td>
                    <td>{{ bg.name }}</td>
                    <td v-for="(segment, index) in bg.data" :key="index">{{ segment }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
