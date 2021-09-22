define(["require", "exports", "../../utils/isValidDate"], function (require, exports, isValidDate_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    function cnId(value) {
        var v = value.trim();
        if (!/^\d{15}$/.test(v) && !/^\d{17}[\dXx]{1}$/.test(v)) {
            return {
                meta: {},
                valid: false,
            };
        }
        var adminDivisionCodes = {
            11: {
                0: [0],
                1: [
                    [0, 9],
                    [11, 17],
                ],
                2: [0, 28, 29],
            },
            12: {
                0: [0],
                1: [[0, 16]],
                2: [0, 21, 23, 25],
            },
            13: {
                0: [0],
                1: [[0, 5], 7, 8, 21, [23, 33], [81, 85]],
                2: [[0, 5], [7, 9], [23, 25], 27, 29, 30, 81, 83],
                3: [
                    [0, 4],
                    [21, 24],
                ],
                4: [[0, 4], 6, 21, [23, 35], 81],
                5: [[0, 3], [21, 35], 81, 82],
                6: [
                    [0, 4],
                    [21, 38],
                    [81, 84],
                ],
                7: [[0, 3], 5, 6, [21, 33]],
                8: [
                    [0, 4],
                    [21, 28],
                ],
                9: [
                    [0, 3],
                    [21, 30],
                    [81, 84],
                ],
                10: [[0, 3], [22, 26], 28, 81, 82],
                11: [[0, 2], [21, 28], 81, 82],
            },
            14: {
                0: [0],
                1: [0, 1, [5, 10], [21, 23], 81],
                2: [[0, 3], 11, 12, [21, 27]],
                3: [[0, 3], 11, 21, 22],
                4: [[0, 2], 11, 21, [23, 31], 81],
                5: [[0, 2], 21, 22, 24, 25, 81],
                6: [
                    [0, 3],
                    [21, 24],
                ],
                7: [[0, 2], [21, 29], 81],
                8: [[0, 2], [21, 30], 81, 82],
                9: [[0, 2], [21, 32], 81],
                10: [[0, 2], [21, 34], 81, 82],
                11: [[0, 2], [21, 30], 81, 82],
                23: [[0, 3], 22, 23, [25, 30], 32, 33],
            },
            15: {
                0: [0],
                1: [
                    [0, 5],
                    [21, 25],
                ],
                2: [
                    [0, 7],
                    [21, 23],
                ],
                3: [[0, 4]],
                4: [
                    [0, 4],
                    [21, 26],
                    [28, 30],
                ],
                5: [[0, 2], [21, 26], 81],
                6: [
                    [0, 2],
                    [21, 27],
                ],
                7: [
                    [0, 3],
                    [21, 27],
                    [81, 85],
                ],
                8: [
                    [0, 2],
                    [21, 26],
                ],
                9: [[0, 2], [21, 29], 81],
                22: [
                    [0, 2],
                    [21, 24],
                ],
                25: [
                    [0, 2],
                    [22, 31],
                ],
                26: [[0, 2], [24, 27], [29, 32], 34],
                28: [0, 1, [22, 27]],
                29: [0, [21, 23]],
            },
            21: {
                0: [0],
                1: [[0, 6], [11, 14], [22, 24], 81],
                2: [[0, 4], [11, 13], 24, [81, 83]],
                3: [[0, 4], 11, 21, 23, 81],
                4: [[0, 4], 11, [21, 23]],
                5: [[0, 5], 21, 22],
                6: [[0, 4], 24, 81, 82],
                7: [[0, 3], 11, 26, 27, 81, 82],
                8: [[0, 4], 11, 81, 82],
                9: [[0, 5], 11, 21, 22],
                10: [[0, 5], 11, 21, 81],
                11: [[0, 3], 21, 22],
                12: [[0, 2], 4, 21, 23, 24, 81, 82],
                13: [[0, 3], 21, 22, 24, 81, 82],
                14: [[0, 4], 21, 22, 81],
            },
            22: {
                0: [0],
                1: [[0, 6], 12, 22, [81, 83]],
                2: [[0, 4], 11, 21, [81, 84]],
                3: [[0, 3], 22, 23, 81, 82],
                4: [[0, 3], 21, 22],
                5: [[0, 3], 21, 23, 24, 81, 82],
                6: [[0, 2], 4, 5, [21, 23], 25, 81],
                7: [[0, 2], [21, 24], 81],
                8: [[0, 2], 21, 22, 81, 82],
                24: [[0, 6], 24, 26],
            },
            23: {
                0: [0],
                1: [[0, 12], 21, [23, 29], [81, 84]],
                2: [[0, 8], 21, [23, 25], 27, [29, 31], 81],
                3: [[0, 7], 21, 81, 82],
                4: [[0, 7], 21, 22],
                5: [[0, 3], 5, 6, [21, 24]],
                6: [
                    [0, 6],
                    [21, 24],
                ],
                7: [[0, 16], 22, 81],
                8: [[0, 5], 11, 22, 26, 28, 33, 81, 82],
                9: [[0, 4], 21],
                10: [[0, 5], 24, 25, 81, [83, 85]],
                11: [[0, 2], 21, 23, 24, 81, 82],
                12: [
                    [0, 2],
                    [21, 26],
                    [81, 83],
                ],
                27: [
                    [0, 4],
                    [21, 23],
                ],
            },
            31: {
                0: [0],
                1: [0, 1, [3, 10], [12, 20]],
                2: [0, 30],
            },
            32: {
                0: [0],
                1: [[0, 7], 11, [13, 18], 24, 25],
                2: [[0, 6], 11, 81, 82],
                3: [[0, 5], 11, 12, [21, 24], 81, 82],
                4: [[0, 2], 4, 5, 11, 12, 81, 82],
                5: [
                    [0, 9],
                    [81, 85],
                ],
                6: [[0, 2], 11, 12, 21, 23, [81, 84]],
                7: [0, 1, 3, 5, 6, [21, 24]],
                8: [[0, 4], 11, 26, [29, 31]],
                9: [[0, 3], [21, 25], 28, 81, 82],
                10: [[0, 3], 11, 12, 23, 81, 84, 88],
                11: [[0, 2], 11, 12, [81, 83]],
                12: [
                    [0, 4],
                    [81, 84],
                ],
                13: [[0, 2], 11, [21, 24]],
            },
            33: {
                0: [0],
                1: [[0, 6], [8, 10], 22, 27, 82, 83, 85],
                2: [0, 1, [3, 6], 11, 12, 25, 26, [81, 83]],
                3: [[0, 4], 22, 24, [26, 29], 81, 82],
                4: [[0, 2], 11, 21, 24, [81, 83]],
                5: [
                    [0, 3],
                    [21, 23],
                ],
                6: [[0, 2], 21, 24, [81, 83]],
                7: [[0, 3], 23, 26, 27, [81, 84]],
                8: [[0, 3], 22, 24, 25, 81],
                9: [[0, 3], 21, 22],
                10: [[0, 4], [21, 24], 81, 82],
                11: [[0, 2], [21, 27], 81],
            },
            34: {
                0: [0],
                1: [[0, 4], 11, [21, 24], 81],
                2: [[0, 4], 7, 8, [21, 23], 25],
                3: [[0, 4], 11, [21, 23]],
                4: [[0, 6], 21],
                5: [[0, 4], 6, [21, 23]],
                6: [[0, 4], 21],
                7: [[0, 3], 11, 21],
                8: [[0, 3], 11, [22, 28], 81],
                10: [
                    [0, 4],
                    [21, 24],
                ],
                11: [[0, 3], 22, [24, 26], 81, 82],
                12: [[0, 4], 21, 22, 25, 26, 82],
                13: [
                    [0, 2],
                    [21, 24],
                ],
                14: [
                    [0, 2],
                    [21, 24],
                ],
                15: [
                    [0, 3],
                    [21, 25],
                ],
                16: [
                    [0, 2],
                    [21, 23],
                ],
                17: [
                    [0, 2],
                    [21, 23],
                ],
                18: [[0, 2], [21, 25], 81],
            },
            35: {
                0: [0],
                1: [[0, 5], 11, [21, 25], 28, 81, 82],
                2: [
                    [0, 6],
                    [11, 13],
                ],
                3: [[0, 5], 22],
                4: [[0, 3], 21, [23, 30], 81],
                5: [[0, 5], 21, [24, 27], [81, 83]],
                6: [[0, 3], [22, 29], 81],
                7: [
                    [0, 2],
                    [21, 25],
                    [81, 84],
                ],
                8: [[0, 2], [21, 25], 81],
                9: [[0, 2], [21, 26], 81, 82],
            },
            36: {
                0: [0],
                1: [[0, 5], 11, [21, 24]],
                2: [[0, 3], 22, 81],
                3: [[0, 2], 13, [21, 23]],
                4: [[0, 3], 21, [23, 30], 81, 82],
                5: [[0, 2], 21],
                6: [[0, 2], 22, 81],
                7: [[0, 2], [21, 35], 81, 82],
                8: [[0, 3], [21, 30], 81],
                9: [
                    [0, 2],
                    [21, 26],
                    [81, 83],
                ],
                10: [
                    [0, 2],
                    [21, 30],
                ],
                11: [[0, 2], [21, 30], 81],
            },
            37: {
                0: [0],
                1: [[0, 5], 12, 13, [24, 26], 81],
                2: [[0, 3], 5, [11, 14], [81, 85]],
                3: [
                    [0, 6],
                    [21, 23],
                ],
                4: [[0, 6], 81],
                5: [
                    [0, 3],
                    [21, 23],
                ],
                6: [[0, 2], [11, 13], 34, [81, 87]],
                7: [[0, 5], 24, 25, [81, 86]],
                8: [[0, 2], 11, [26, 32], [81, 83]],
                9: [[0, 3], 11, 21, 23, 82, 83],
                10: [
                    [0, 2],
                    [81, 83],
                ],
                11: [[0, 3], 21, 22],
                12: [[0, 3]],
                13: [[0, 2], 11, 12, [21, 29]],
                14: [[0, 2], [21, 28], 81, 82],
                15: [[0, 2], [21, 26], 81],
                16: [
                    [0, 2],
                    [21, 26],
                ],
                17: [
                    [0, 2],
                    [21, 28],
                ],
            },
            41: {
                0: [0],
                1: [[0, 6], 8, 22, [81, 85]],
                2: [[0, 5], 11, [21, 25]],
                3: [[0, 7], 11, [22, 29], 81],
                4: [[0, 4], 11, [21, 23], 25, 81, 82],
                5: [[0, 3], 5, 6, 22, 23, 26, 27, 81],
                6: [[0, 3], 11, 21, 22],
                7: [[0, 4], 11, 21, [24, 28], 81, 82],
                8: [[0, 4], 11, [21, 23], 25, [81, 83]],
                9: [[0, 2], 22, 23, [26, 28]],
                10: [[0, 2], [23, 25], 81, 82],
                11: [
                    [0, 4],
                    [21, 23],
                ],
                12: [[0, 2], 21, 22, 24, 81, 82],
                13: [[0, 3], [21, 30], 81],
                14: [[0, 3], [21, 26], 81],
                15: [
                    [0, 3],
                    [21, 28],
                ],
                16: [[0, 2], [21, 28], 81],
                17: [
                    [0, 2],
                    [21, 29],
                ],
                90: [0, 1],
            },
            42: {
                0: [0],
                1: [
                    [0, 7],
                    [11, 17],
                ],
                2: [[0, 5], 22, 81],
                3: [[0, 3], [21, 25], 81],
                5: [
                    [0, 6],
                    [25, 29],
                    [81, 83],
                ],
                6: [[0, 2], 6, 7, [24, 26], [82, 84]],
                7: [[0, 4]],
                8: [[0, 2], 4, 21, 22, 81],
                9: [[0, 2], [21, 23], 81, 82, 84],
                10: [[0, 3], [22, 24], 81, 83, 87],
                11: [[0, 2], [21, 27], 81, 82],
                12: [[0, 2], [21, 24], 81],
                13: [[0, 3], 21, 81],
                28: [[0, 2], 22, 23, [25, 28]],
                90: [0, [4, 6], 21],
            },
            43: {
                0: [0],
                1: [[0, 5], 11, 12, 21, 22, 24, 81],
                2: [[0, 4], 11, 21, [23, 25], 81],
                3: [[0, 2], 4, 21, 81, 82],
                4: [0, 1, [5, 8], 12, [21, 24], 26, 81, 82],
                5: [[0, 3], 11, [21, 25], [27, 29], 81],
                6: [[0, 3], 11, 21, 23, 24, 26, 81, 82],
                7: [[0, 3], [21, 26], 81],
                8: [[0, 2], 11, 21, 22],
                9: [[0, 3], [21, 23], 81],
                10: [[0, 3], [21, 28], 81],
                11: [
                    [0, 3],
                    [21, 29],
                ],
                12: [[0, 2], [21, 30], 81],
                13: [[0, 2], 21, 22, 81, 82],
                31: [0, 1, [22, 27], 30],
            },
            44: {
                0: [0],
                1: [[0, 7], [11, 16], 83, 84],
                2: [[0, 5], 21, 22, 24, 29, 32, 33, 81, 82],
                3: [0, 1, [3, 8]],
                4: [[0, 4]],
                5: [0, 1, [6, 15], 23, 82, 83],
                6: [0, 1, [4, 8]],
                7: [0, 1, [3, 5], 81, [83, 85]],
                8: [[0, 4], 11, 23, 25, [81, 83]],
                9: [[0, 3], 23, [81, 83]],
                12: [[0, 3], [23, 26], 83, 84],
                13: [[0, 3], [22, 24], 81],
                14: [[0, 2], [21, 24], 26, 27, 81],
                15: [[0, 2], 21, 23, 81],
                16: [
                    [0, 2],
                    [21, 25],
                ],
                17: [[0, 2], 21, 23, 81],
                18: [[0, 3], 21, 23, [25, 27], 81, 82],
                19: [0],
                20: [0],
                51: [[0, 3], 21, 22],
                52: [[0, 3], 21, 22, 24, 81],
                53: [[0, 2], [21, 23], 81],
            },
            45: {
                0: [0],
                1: [
                    [0, 9],
                    [21, 27],
                ],
                2: [
                    [0, 5],
                    [21, 26],
                ],
                3: [[0, 5], 11, 12, [21, 32]],
                4: [0, 1, [3, 6], 11, [21, 23], 81],
                5: [[0, 3], 12, 21],
                6: [[0, 3], 21, 81],
                7: [[0, 3], 21, 22],
                8: [[0, 4], 21, 81],
                9: [[0, 3], [21, 24], 81],
                10: [
                    [0, 2],
                    [21, 31],
                ],
                11: [
                    [0, 2],
                    [21, 23],
                ],
                12: [[0, 2], [21, 29], 81],
                13: [[0, 2], [21, 24], 81],
                14: [[0, 2], [21, 25], 81],
            },
            46: {
                0: [0],
                1: [0, 1, [5, 8]],
                2: [0, 1],
                3: [0, [21, 23]],
                90: [
                    [0, 3],
                    [5, 7],
                    [21, 39],
                ],
            },
            50: {
                0: [0],
                1: [[0, 19]],
                2: [0, [22, 38], [40, 43]],
                3: [0, [81, 84]],
            },
            51: {
                0: [0],
                1: [0, 1, [4, 8], [12, 15], [21, 24], 29, 31, 32, [81, 84]],
                3: [[0, 4], 11, 21, 22],
                4: [[0, 3], 11, 21, 22],
                5: [[0, 4], 21, 22, 24, 25],
                6: [0, 1, 3, 23, 26, [81, 83]],
                7: [0, 1, 3, 4, [22, 27], 81],
                8: [[0, 2], 11, 12, [21, 24]],
                9: [
                    [0, 4],
                    [21, 23],
                ],
                10: [[0, 2], 11, 24, 25, 28],
                11: [[0, 2], [11, 13], 23, 24, 26, 29, 32, 33, 81],
                13: [[0, 4], [21, 25], 81],
                14: [
                    [0, 2],
                    [21, 25],
                ],
                15: [
                    [0, 3],
                    [21, 29],
                ],
                16: [[0, 3], [21, 23], 81],
                17: [[0, 3], [21, 25], 81],
                18: [
                    [0, 3],
                    [21, 27],
                ],
                19: [
                    [0, 3],
                    [21, 23],
                ],
                20: [[0, 2], 21, 22, 81],
                32: [0, [21, 33]],
                33: [0, [21, 38]],
                34: [0, 1, [22, 37]],
            },
            52: {
                0: [0],
                1: [[0, 3], [11, 15], [21, 23], 81],
                2: [0, 1, 3, 21, 22],
                3: [[0, 3], [21, 30], 81, 82],
                4: [
                    [0, 2],
                    [21, 25],
                ],
                5: [
                    [0, 2],
                    [21, 27],
                ],
                6: [
                    [0, 3],
                    [21, 28],
                ],
                22: [0, 1, [22, 30]],
                23: [0, 1, [22, 28]],
                24: [0, 1, [22, 28]],
                26: [0, 1, [22, 36]],
                27: [[0, 2], 22, 23, [25, 32]],
            },
            53: {
                0: [0],
                1: [[0, 3], [11, 14], 21, 22, [24, 29], 81],
                3: [[0, 2], [21, 26], 28, 81],
                4: [
                    [0, 2],
                    [21, 28],
                ],
                5: [
                    [0, 2],
                    [21, 24],
                ],
                6: [
                    [0, 2],
                    [21, 30],
                ],
                7: [
                    [0, 2],
                    [21, 24],
                ],
                8: [
                    [0, 2],
                    [21, 29],
                ],
                9: [
                    [0, 2],
                    [21, 27],
                ],
                23: [0, 1, [22, 29], 31],
                25: [
                    [0, 4],
                    [22, 32],
                ],
                26: [0, 1, [21, 28]],
                27: [0, 1, [22, 30]],
                28: [0, 1, 22, 23],
                29: [0, 1, [22, 32]],
                31: [0, 2, 3, [22, 24]],
                34: [0, [21, 23]],
                33: [0, 21, [23, 25]],
                35: [0, [21, 28]],
            },
            54: {
                0: [0],
                1: [
                    [0, 2],
                    [21, 27],
                ],
                21: [0, [21, 29], 32, 33],
                22: [0, [21, 29], [31, 33]],
                23: [0, 1, [22, 38]],
                24: [0, [21, 31]],
                25: [0, [21, 27]],
                26: [0, [21, 27]],
            },
            61: {
                0: [0],
                1: [[0, 4], [11, 16], 22, [24, 26]],
                2: [[0, 4], 22],
                3: [
                    [0, 4],
                    [21, 24],
                    [26, 31],
                ],
                4: [[0, 4], [22, 31], 81],
                5: [[0, 2], [21, 28], 81, 82],
                6: [
                    [0, 2],
                    [21, 32],
                ],
                7: [
                    [0, 2],
                    [21, 30],
                ],
                8: [
                    [0, 2],
                    [21, 31],
                ],
                9: [
                    [0, 2],
                    [21, 29],
                ],
                10: [
                    [0, 2],
                    [21, 26],
                ],
            },
            62: {
                0: [0],
                1: [[0, 5], 11, [21, 23]],
                2: [0, 1],
                3: [[0, 2], 21],
                4: [
                    [0, 3],
                    [21, 23],
                ],
                5: [
                    [0, 3],
                    [21, 25],
                ],
                6: [
                    [0, 2],
                    [21, 23],
                ],
                7: [
                    [0, 2],
                    [21, 25],
                ],
                8: [
                    [0, 2],
                    [21, 26],
                ],
                9: [[0, 2], [21, 24], 81, 82],
                10: [
                    [0, 2],
                    [21, 27],
                ],
                11: [
                    [0, 2],
                    [21, 26],
                ],
                12: [
                    [0, 2],
                    [21, 28],
                ],
                24: [0, 21, [24, 29]],
                26: [0, 21, [23, 30]],
                29: [0, 1, [21, 27]],
                30: [0, 1, [21, 27]],
            },
            63: {
                0: [0],
                1: [
                    [0, 5],
                    [21, 23],
                ],
                2: [0, 2, [21, 25]],
                21: [0, [21, 23], [26, 28]],
                22: [0, [21, 24]],
                23: [0, [21, 24]],
                25: [0, [21, 25]],
                26: [0, [21, 26]],
                27: [0, 1, [21, 26]],
                28: [
                    [0, 2],
                    [21, 23],
                ],
            },
            64: {
                0: [0],
                1: [0, 1, [4, 6], 21, 22, 81],
                2: [[0, 3], 5, [21, 23]],
                3: [[0, 3], [21, 24], 81],
                4: [
                    [0, 2],
                    [21, 25],
                ],
                5: [[0, 2], 21, 22],
            },
            65: {
                0: [0],
                1: [[0, 9], 21],
                2: [[0, 5]],
                21: [0, 1, 22, 23],
                22: [0, 1, 22, 23],
                23: [[0, 3], [23, 25], 27, 28],
                28: [0, 1, [22, 29]],
                29: [0, 1, [22, 29]],
                30: [0, 1, [22, 24]],
                31: [0, 1, [21, 31]],
                32: [0, 1, [21, 27]],
                40: [0, 2, 3, [21, 28]],
                42: [[0, 2], 21, [23, 26]],
                43: [0, 1, [21, 26]],
                90: [[0, 4]],
                27: [[0, 2], 22, 23],
            },
            71: { 0: [0] },
            81: { 0: [0] },
            82: { 0: [0] },
        };
        var provincial = parseInt(v.substr(0, 2), 10);
        var prefectural = parseInt(v.substr(2, 2), 10);
        var county = parseInt(v.substr(4, 2), 10);
        if (!adminDivisionCodes[provincial] ||
            !adminDivisionCodes[provincial][prefectural]) {
            return {
                meta: {},
                valid: false,
            };
        }
        var inRange = false;
        var rangeDef = adminDivisionCodes[provincial][prefectural];
        var i;
        for (i = 0; i < rangeDef.length; i++) {
            if ((Array.isArray(rangeDef[i]) &&
                rangeDef[i][0] <= county &&
                county <= rangeDef[i][1]) ||
                (!Array.isArray(rangeDef[i]) && county === rangeDef[i])) {
                inRange = true;
                break;
            }
        }
        if (!inRange) {
            return {
                meta: {},
                valid: false,
            };
        }
        var dob;
        if (v.length === 18) {
            dob = v.substr(6, 8);
        }
        else {
            dob = "19" + v.substr(6, 6);
        }
        var year = parseInt(dob.substr(0, 4), 10);
        var month = parseInt(dob.substr(4, 2), 10);
        var day = parseInt(dob.substr(6, 2), 10);
        if (!isValidDate_1.default(year, month, day)) {
            return {
                meta: {},
                valid: false,
            };
        }
        if (v.length === 18) {
            var weight = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2];
            var sum = 0;
            for (i = 0; i < 17; i++) {
                sum += parseInt(v.charAt(i), 10) * weight[i];
            }
            sum = (12 - (sum % 11)) % 11;
            var checksum = v.charAt(17).toUpperCase() !== 'X'
                ? parseInt(v.charAt(17), 10)
                : 10;
            return {
                meta: {},
                valid: checksum === sum,
            };
        }
        return {
            meta: {},
            valid: true,
        };
    }
    exports.default = cnId;
});
