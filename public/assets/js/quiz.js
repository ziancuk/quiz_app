function showKolom(m) {
    return `
    <th scope="col">Jenis Kuis</th>
    <th scope="col">Total Pertanyaan</th>
    <th scope="col">Status Kuis</th>
    `
}
const tableContainer = document.querySelector('.judul');

fetch('/api/v2/quiz/1')
    .then(response => response.json())
    .then(response => {
        const soal = response;

        let column = '';
        soal.forEach(m => column += showSoal(m));
        soal.forEach(n => column += showJawaban(n));

        const soalContainer = document.querySelector('.soal');
        soalContainer.innerHTML = column;
    });

function showSoal(m) {
    return `<p>${m.question}</p>`
}

function showJawaban(n) {
    n.option.forEach(a => {
        `<div class="form-check">
                <input class="form-check-input" type="radio" name="option" id="option1" value="${a.id}" checked>
                <label class="form-check-label" for="option">
                    ${a.option}
                </label>
                </div>`
    })
    }
