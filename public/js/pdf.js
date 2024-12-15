const url = "{{ route('cv.view') }}";

const pdfjsLib = window["pdfjs-dist/build/pdf"];
pdfjsLib.GlobalWorkerOptions.workerSrc =
    "{{ asset('pdfjs/build/pdf.worker.js') }}";

const loadingTask = pdfjsLib.getDocument(url);
loadingTask.promise.then((pdf) => {
    pdf.getPage(1).then((page) => {
        const scale = 1.5;
        const viewport = page.getViewport({ scale });

        const canvas = document.getElementById("pdf-render");
        const context = canvas.getContext("2d");
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        const renderContext = {
            canvasContext: context,
            viewport: viewport,
        };
        page.render(renderContext);
    });
});
