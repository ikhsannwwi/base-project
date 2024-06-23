var optionToast = {
    classname: "toast",
    transition: "fade",
    insertBefore: true,
    duration: 4000,
    enableSounds: true,
    autoClose: true,
    progressBar: true,
    sounds: {
        info: toastMessages.path + "/sounds/info/1.mp3",
        // path to sound for successfull message:
        success: toastMessages.path + "/sounds/success/1.mp3",
        // path to sound for warn message:
        warning: toastMessages.path + "/sounds/warning/1.mp3",
        // path to sound for error message:
        error: toastMessages.path + "/sounds/error/1.mp3",
    },

    onShow: function(type) {
        console.log("a toast " + type + " message is shown!");
    },
    onHide: function(type) {
        console.log("the toast " + type + " message is hidden!");
    },

    // the placement where prepend the toast container:
    prependTo: document.body.childNodes[0],
};