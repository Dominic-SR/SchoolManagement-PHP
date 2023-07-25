CKEDITOR.replace( 'label-input' );


const videoInput = document.getElementById('videoInput');
const videoElement = document.getElementById('videoElement');
const submit_label = document.getElementById("submit-btn")
const modal_popup_click = document.getElementById("popup-content")

// lable variable assign
const add_lable_element = document.getElementById("add-label")
const add_lable_btn = document.getElementById("add-lable-btn")
const continue_btn = document.getElementById('continue-btn')

let lables = []
let labeltexts = []

// link type assign
const add_link_btn = document.getElementById('add-link-btn')
const add_link_element = document.getElementById("add-link")
const link_submit_btn = document.getElementById("link-submit-btn")
const link_bath = document.getElementById("link-URL")

let linkTitle = []
let linkURL = []

// Image type assign 
const add_image_btn = document.getElementById("add-image-btn")
const add_image_element = document.getElementById("add-image")
const image_submit_btn = document.getElementById("image-submit-btn")    
const Image_path = document.getElementById('image-input')
const Image_element = document.getElementById("imageFile")
let imageFile = []

        videoInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            const videoURL = URL.createObjectURL(file);
            videoElement.src = videoURL;
            videoContainer.style.display = "block";
            
        });


        // lable functions
        
        // lable add button
        add_lable_btn.addEventListener("click", () =>{
            add_lable_element.style.display = "block"
            add_link_element.style.display = "none"
            add_image_element.style.display = "none"

            // handle inside popup for Lable add button
            document.getElementById('link-title').style.display = "none";
            document.getElementById('link-URL').style.display = "none";   
            Image_element.src = ""
            document.getElementById("popup-content").style.display = "none"
            linkURL = []
            linkTitle = []
        })

        // lable submit
        submit_label.addEventListener("click", () => {
            let label = document.getElementById("label-input")

            const textareaValue = CKEDITOR.instances['label-input'].getData() ;
            
            lables.push(textareaValue)
            videoElement.pause();
            // assign value in input

            document.getElementById('lables').style.display = "block";
            document.getElementById("lables").innerHTML = lables[0]
            document.getElementById("popup-content").style.display = "block"

            CKEDITOR.instances['label-input'] = [];
            add_lable_element.style.display = "none"
            Image_element.style.display = "none"
        })

        
        // link function

        // link add button
        add_link_btn.addEventListener("click", ()=>{
            add_link_element.style.display = "block"
            add_lable_element.style.display = "none"
            add_image_element.style.display = "none"

            // handle inside popup for Link add button
            document.getElementById('lables').style.display = "none";
            document.getElementById('imageFile').style.display = "none"
            document.getElementById("popup-content").style.display = "none"
            Image_element.src = ""
            lables = []
            labeltexts = []
        })

        // link submit
        link_submit_btn.addEventListener("click",()=>{
            let link_title = document.getElementById("link-title-input")
            let link_url = document.getElementById("link-text-input")

            linkTitle.push(link_title.value);
            linkURL.push(link_url.value)
            videoElement.pause()

            // assign value in input
            document.getElementById('link-title').style.display = "block";
            document.getElementById('link-URL').style.display = "block";   
            document.getElementById("link-title").innerText = linkTitle[0]
            document.getElementById("link-URL").innerText = linkURL[0]
            link_bath.href = linkURL[0]
            document.getElementById("popup-content").style.display = "block"
            link_title.value = "";
            link_url.value = "";

            add_link_element.style.display = "none"
        })

        // image function

        // image add button
        add_image_btn.addEventListener("click", ()=>{
            add_image_element.style.display = "block"
            add_lable_element.style.display = "none"
            add_link_element.style.display = "none"

            // handle inside popup for image add button
            document.getElementById('lables').style.display = "none";
            document.getElementById('link-title').style.display = "none";
            document.getElementById('link-URL').style.display = "none";   
            document.getElementById("popup-content").style.display = "none"
        })

        // image onchange handle 
        Image_path.addEventListener('change', (event) => {
            const file = event.target.files[0];
            const imageURL = URL.createObjectURL(file);

            // assign value in input 
            Image_element.src = imageURL

            document.getElementById("popup-content").style.display = "none"
        });

        // image submit
        image_submit_btn.addEventListener("click",()=>{
            let img_value = document.getElementById("image-input")
            videoElement.pause()
            document.getElementById('imageFile').style.display = "block";   
            document.getElementById("popup-content").style.display = "block";
            img_value.value = ""
        })


        // modal popup onclick 
        modal_popup_click.addEventListener('click',()=>{
            document.getElementById("sub-popup").style.display = "block"
        })

        // close popup
        // continue_btn.addEventListener("click", ()=>{
        //     document.getElementById("popup-content").style.display = "none";
        // })


        // Drag and drop Module

        const wrapper = document.querySelector(".popup-wrapper");

        const header = wrapper.querySelector("#popup-content");

        wrapper.addEventListener("mousedown", function() {
        document.onmousemove = function(e) {
            console.log("X____>",e.clientX,'Y_____>',e.clientY)
            var x = e.clientX;
            var y = e.clientY;
            // x = 480
            // y = 180
            console.log(x > 80 && y > 80);
            if(x > 620 && y > 180 && x < 1200 && y < 480){
            wrapper.position = "relative";
            wrapper.style.left = x + "px";
            wrapper.style.top = y + "px";
            }
        };
        });

        document.addEventListener("mouseup", function() {
        document.onmousemove = null;
        });