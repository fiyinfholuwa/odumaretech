

function mainthumbUrl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#mainThumb').attr('src', e.target.result);
            $('#mainThumb').attr('class', 'mt-2')
            $('#mainThumb').attr('height', '5%')
        };
        reader.readAsDataURL(input.files[0]);
    };
};


function remove(filename, Element) {
    //remove element from DOM
    document.getElementById(filename).remove();

    var inputElement = document.getElementById(Element);
    //handle input files
    const files = Array.from(inputElement.files);

    //remove file with selected file name 
    const updatedFiles = files.filter(file => file.name !== filename);
    const newFileList = new DataTransfer();

    //remove styles 
    if (inputElement.files.length <= 1) document.getElementById(Element + '_result').setAttribute('style', false)

    //add all files to the file list
    updatedFiles.forEach(file => {
        newFileList.items.add(file);
    });

    //update input with new updated files
    inputElement.files = newFileList.files;

}

document.querySelector("#id_card").addEventListener("change", (e) => {

    if (window.File && window.FileReader && window.FileList && window.Blob) {
        const files = e.target.files;
        // console.log(files);
        const output = document.querySelector("#id_card_result");
        output.innerHTML = "";
        var id_card = document.getElementById("id_card");
        for (let i = 0; i < files.length; i++) {
            if (!files[i].type.match("image") && !files[i].type.match("application/pdf")) {
                continue;
            } else {
                if (files[i].type.match("application/pdf")) {
                    const picReader = new FileReader();
                    picReader.addEventListener("load", function (event) {
                        const picFile = event.target;
                        const div = document.createElement("div");
                        output.style.padding = "10px 0px";
                        const width = 50
                        const filename = files[i].name;
                        div.setAttribute('id', filename)
                        div.innerHTML =
                            `<div class="d-flex" style="gap:5px" ><div class="pdf py-3 px-2" style="width:100px;height:100px;background-color:blue;color:white;"><h5 >${files[i].name}</h5></div><div class="delete">
                                <a class="btn btn-sm  btn-danger text-white " onclick="remove('${filename}','id_card')" id="delete" ><i class="fa fa-trash"></i></a></div></div>`;
                        output.appendChild(div);
                    });
                    picReader.readAsDataURL(files[i]);
                } else {
                    const picReader = new FileReader();
                    picReader.addEventListener("load", function (event) {
                        const picFile = event.target;
                        const div = document.createElement("div");
                        output.style.padding = "10px 0px";
                        const width = 50
                        const filename = files[i].name;
                        div.setAttribute('id', filename)
                        div.innerHTML =
                            `<div class="d-flex" style="gap:5px" ><img class="thumbnail" src="${picFile.result}" title="${picFile.name}" width="100px" height="100px" /><div class="delete">
                    <a class="btn btn-sm  btn-danger text-white " onclick="remove('${filename}','id_card')" id="delete" ><i class="fa fa-trash"></i></a></div></div>`;
                        output.appendChild(div);
                    });
                    picReader.readAsDataURL(files[i]);
                }
            }

        }

    } else {
        alert("Your browser does not support File API");
    }

});



document.querySelector("#pay_slip").addEventListener("change", (e) => {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        const files = e.target.files;
        const output = document.querySelector("#pay_slip_result");
        output.innerHTML = "";

        for (let i = 0; i < files.length; i++) {
            if (!files[i].type.match("image") && !files[i].type.match("application/pdf")) {
                continue;
            } else {
                if (files[i].type.match("application/pdf")) {
                    const picReader = new FileReader();
                    picReader.addEventListener("load", function (event) {
                        const picFile = event.target;
                        const div = document.createElement("div");
                        output.style.padding = "10px 0px";
                        const width = 50
                        const filename = files[i].name;
                        div.setAttribute('id', filename)
                        div.innerHTML =
                            `<div class="d-flex" style="gap:5px" ><div class="pdf pt-4 px-2" style="width:100px;height:100px;background-color:blue;color:white;"><h5>${files[i].name}</h5></div><div class="delete">
                                <a class="btn btn-sm  btn-danger text-white " onclick="remove('${filename}','id_card')" id="delete" ><i class="fa fa-trash"></i></a></div></div>`;
                        output.appendChild(div);
                    });
                    picReader.readAsDataURL(files[i]);
                } else {
                    const picReader = new FileReader();
                    picReader.addEventListener("load", function (event) {
                        const picFile = event.target;
                        const div = document.createElement("div");
                        output.style.padding = "10px 0px";
                        const width = 50
                        const filename = files[i].name;
                        div.setAttribute('id', filename)
                        div.innerHTML =
                            `<div class="d-flex" style="gap:5px" ><img class="thumbnail" src="${picFile.result}" title="${picFile.name}" width="100px" height="100px" /><div class="delete">
                    <a class="btn btn-sm  btn-danger text-white " onclick="remove('${filename}','id_card')" id="delete" ><i class="fa fa-trash"></i></a></div></div>`;
                        output.appendChild(div);
                    });
                    picReader.readAsDataURL(files[i]);
                }
            }
        }
    } else {
        alert("Your browser does not support File API");
    }
});

document.querySelector("#letter_of_intro").addEventListener("change", (e) => {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        const files = e.target.files;
        const output = document.querySelector("#letter_of_intro_result");
        output.innerHTML = "";

        for (let i = 0; i < files.length; i++) {
            if (!files[i].type.match("image") && !files[i].type.match("application/pdf")) {
                continue;
            } else {
                if (files[i].type.match("application/pdf")) {
                    const picReader = new FileReader();
                    picReader.addEventListener("load", function (event) {
                        const picFile = event.target;
                        const div = document.createElement("div");
                        output.style.padding = "10px 0px";
                        const width = 50
                        const filename = files[i].name;
                        div.setAttribute('id', filename)
                        div.innerHTML =
                            `<div class="d-flex" style="gap:5px" ><div class="pdf pt-4 px-2" style="width:100px;height:100px;background-color:blue;color:white;"><h5>${files[i].name}</h5></div><div class="delete">
                                <a class="btn btn-sm  btn-danger text-white " onclick="remove('${filename}','id_card')" id="delete" ><i class="fa fa-trash"></i></a></div></div>`;
                        output.appendChild(div);
                    });
                    picReader.readAsDataURL(files[i]);
                } else {
                    const picReader = new FileReader();
                    picReader.addEventListener("load", function (event) {
                        const picFile = event.target;
                        const div = document.createElement("div");
                        output.style.padding = "10px 0px";
                        const width = 50
                        const filename = files[i].name;
                        div.setAttribute('id', filename)
                        div.innerHTML =
                            `<div class="d-flex" style="gap:5px" ><img class="thumbnail" src="${picFile.result}" title="${picFile.name}" width="100px" height="100px" /><div class="delete">
                    <a class="btn btn-sm  btn-danger text-white " onclick="remove('${filename}','id_card')" id="delete" ><i class="fa fa-trash"></i></a></div></div>`;
                        output.appendChild(div);
                    });
                    picReader.readAsDataURL(files[i]);
                }
            }
        }
    } else {
        alert("Your browser does not support File API");
    }
});

document.querySelector("#letter_of_employ").addEventListener("change", (e) => {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        const files = e.target.files;
        const output = document.querySelector("#letter_of_employ_result");
        output.innerHTML = "";

        for (let i = 0; i < files.length; i++) {
            if (!files[i].type.match("image") && !files[i].type.match("application/pdf")) {
                continue;
            } else {
                if (files[i].type.match("application/pdf")) {
                    const picReader = new FileReader();
                    picReader.addEventListener("load", function (event) {
                        const picFile = event.target;
                        const div = document.createElement("div");
                        output.style.padding = "10px 0px";
                        const width = 50
                        const filename = files[i].name;
                        div.setAttribute('id', filename)
                        div.innerHTML =
                            `<div class="d-flex" style="gap:5px" ><div class="pdf pt-4 px-2" style="width:100px;height:100px;background-color:blue;color:white;"><h5>${files[i].name}</h5></div><div class="delete">
                                <a class="btn btn-sm  btn-danger text-white " onclick="remove('${filename}','id_card')" id="delete" ><i class="fa fa-trash"></i></a></div></div>`;
                        output.appendChild(div);
                    });
                    picReader.readAsDataURL(files[i]);
                } else {
                    const picReader = new FileReader();
                    picReader.addEventListener("load", function (event) {
                        const picFile = event.target;
                        const div = document.createElement("div");
                        output.style.padding = "10px 0px";
                        const width = 50
                        const filename = files[i].name;
                        div.setAttribute('id', filename)
                        div.innerHTML =
                            `<div class="d-flex" style="gap:5px" ><img class="thumbnail" src="${picFile.result}" title="${picFile.name}" width="100px" height="100px" /><div class="delete">
                    <a class="btn btn-sm  btn-danger text-white " onclick="remove('${filename}','id_card')" id="delete" ><i class="fa fa-trash"></i></a></div></div>`;
                        output.appendChild(div);
                    });
                    picReader.readAsDataURL(files[i]);
                }
            }
        }
    } else {
        alert("Your browser does not support File API");
    }
});

document.querySelector("#other_documents").addEventListener("change", (e) => {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        const files = e.target.files;
        const output = document.querySelector("#other_documents_result");
        output.innerHTML = "";

        for (let i = 0; i < files.length; i++) {
            if (!files[i].type.match("image") && !files[i].type.match("application/pdf")) {
                continue;
            } else {
                if (files[i].type.match("application/pdf")) {
                    const picReader = new FileReader();
                    picReader.addEventListener("load", function (event) {
                        const picFile = event.target;
                        const div = document.createElement("div");
                        output.style.padding = "10px 0px";
                        const width = 50
                        const filename = files[i].name;
                        div.setAttribute('id', filename)
                        div.innerHTML =
                            `<div class="d-flex" style="gap:5px" ><div class="pdf pt-4 px-2" style="width:100px;height:100px;background-color:blue;color:white;"><h5>${files[i].name}</h5></div><div class="delete">
                                <a class="btn btn-sm  btn-danger text-white " onclick="remove('${filename}','id_card')" id="delete" ><i class="fa fa-trash"></i></a></div></div>`;
                        output.appendChild(div);
                    });
                    picReader.readAsDataURL(files[i]);
                } else {
                    const picReader = new FileReader();
                    picReader.addEventListener("load", function (event) {
                        const picFile = event.target;
                        const div = document.createElement("div");
                        output.style.padding = "10px 0px";
                        const width = 50
                        const filename = files[i].name;
                        div.setAttribute('id', filename)
                        div.innerHTML =
                            `<div class="d-flex" style="gap:5px" ><img class="thumbnail" src="${picFile.result}" title="${picFile.name}" width="100px" height="100px" /><div class="delete">
                    <a class="btn btn-sm  btn-danger text-white " onclick="remove('${filename}','id_card')" id="delete" ><i class="fa fa-trash"></i></a></div></div>`;
                        output.appendChild(div);
                    });
                    picReader.readAsDataURL(files[i]);
                }
            }
        }
    } else {
        alert("Your browser does not support File API");
    }
});


