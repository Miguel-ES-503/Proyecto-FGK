window.onload = function() {
    const guidePosition = [{
            top: 50,
            left: 90
        },
        {
            top: 190,
            left: 160
        },
        {
            top: 230,
            left: 390
        },
        {
            top: 360,
            left: 520
        },
        {
            top: 55,
            left: 800
        }
    ];
    const bodyTextEle = document.getElementById("guideBodyText");
    const contentEle = document.getElementById("guideContent");
    const stepLiEle = document.getElementsByClassName("dot");
    let currentStepIndex = -1;
    const stepLength = guidePosition.length;
    changeStep();
    document.getElementById("guideNextBtn").addEventListener(
        "click",
        () => {
            changeStep("next");
        },
        false
    );
    document.getElementById("guidePrevBtn").addEventListener(
        "click",
        () => {
            changeStep("prev");
        },
        false
    );
    document.getElementById("closeBtn").addEventListener(
        "click",
        () => {
            var fadeTarget = document.getElementById("guideContent");
            var fadeEffect = setInterval(function() {
                if (!fadeTarget.style.opacity) {
                    fadeTarget.style.opacity = 1;
                }
                if (fadeTarget.style.opacity > 0) {
                    fadeTarget.style.opacity -= 0.1;
                } else {
                    clearInterval(fadeEffect);
                }
            }, 400);
        },
        false
    );

    function changeStep(direction) {
        if (
            (direction === "prev" && currentStepIndex === 0) ||
            (direction === "next" && currentStepIndex === stepLength - 1)
        ) {
            var fadeTarget = document.getElementById("guideContent");
            var fadeEffect = setInterval(function() {
                if (!fadeTarget.style.opacity) {
                    fadeTarget.style.opacity = 1;
                }
                if (fadeTarget.style.opacity > 0) {
                    fadeTarget.style.opacity -= 0.1;
                } else {
                    clearInterval(fadeEffect);
                }
            }, 400);
        } else {
            let eraseDotIndex;
            if (direction === "prev") {
                currentStepIndex = currentStepIndex - 1;
                eraseDotIndex =
                    currentStepIndex === stepLength - 1 ? 0 : currentStepIndex + 1;
            } else {
                currentStepIndex = currentStepIndex + 1;
                eraseDotIndex =
                    currentStepIndex === 0 ? stepLength - 1 : currentStepIndex - 1;
            }
            bodyTextEle.style.marginLeft = `${-360 * currentStepIndex}px`;
            // bodyTextEle.style.left = `${-360*currentStepIndex}px`;
            stepLiEle[eraseDotIndex].setAttribute("data-step", ""); // erase number
            stepLiEle[currentStepIndex].setAttribute(
                "data-step",
                currentStepIndex + 1
            ); // add number
            stepLiEle[eraseDotIndex].classList.remove("active"); // remove dot active
            stepLiEle[currentStepIndex].classList.add("active"); // add dot active
            contentEle.style.top = guidePosition[currentStepIndex].top + "px";
            contentEle.style.left = guidePosition[currentStepIndex].left + "px";
        }
    }
};