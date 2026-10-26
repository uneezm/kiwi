function siteLoad() {
    const title = document.getElementById('title');
    const eachRows = document.querySelectorAll('.rows');
    function showTitle() {
        title.className = "show";
    }
    setTimeout(showTitle, 300);
    eachRows.forEach((rows, index) => {
        setTimeout(() => {
            rows.classList.add("show");
        }, index * 200);
    });
}
window.onload = function() {
    siteLoad();
}
function yourStoma() {
    const stoma = document.querySelector('input[name="stoma"]:checked')?.value;
    const skin = document.querySelector('input[name="skin"]:checked')?.value;
    const stomach = document.querySelector('input[name="stomach"]:checked')?.value;
    const tone = document.querySelector('input[name="tone"]:checked')?.value;
    const change = document.querySelector('input[name="change"]:checked')?.value;
    let needConvex = false;
    if (stoma === "inskinlevel" || stoma === "retracted" || skin === "injured" || stomach === "wrinkled" || stomach === "deep" || tone === "mixed" || tone === "flabby" || change === "yes") {
        needConvex = true;
    }
    else if (stoma === "prominent" && skin === "intact" && stomach === "smooth" && tone === "tight" && change === "no") {
        needConvex = false;
    }
    toggleConvex(needConvex);
    setReasons();
}
function toggleConvex(isYes) {
    const yesDiv = document.getElementById("convex-yes");
    const noDiv = document.getElementById("convex-no");
    const yesChecked = document.querySelector('input[name="convex_yes_no"][value="yes"]');
    const noChecked = document.querySelector('input[name="convex_yes_no"][value="no"]');
    yesChecked.checked = false;
    noChecked.checked = false;
    if (!yesDiv || !noDiv) return;
    if (isYes) {
        yesChecked.checked = true;
    }
    else {
        noChecked.checked = true;
    }
    yesDiv.classList.toggle("hidden", !isYes);
    noDiv.classList.toggle("hidden", isYes);
}
function setReasons() {
    const stoma = document.querySelector('input[name="stoma"]:checked')?.value;
    const skin = document.querySelector('input[name="skin"]:checked')?.value;
    const stomach = document.querySelector('input[name="stomach"]:checked')?.value;
    const tone = document.querySelector('input[name="tone"]:checked')?.value;
    const change = document.querySelector('input[name="change"]:checked')?.value;
    const reasonNotRising = document.querySelector('input[name="reason[]"][value="not_rising"]');
    const reasonLeaking = document.querySelector('input[name="reason[]"][value="leaking"]');
    const reasonFolds = document.querySelector('input[name="reason[]"][value="folds"]');
    const reasonSkinProblem = document.querySelector('input[name="reason[]"][value="skinproblem"]');
    const noProblem = document.querySelector('input[name="no_reason"][value="good_stoma"]');
    reasonNotRising.checked = false;
    reasonLeaking.checked = false;
    reasonFolds.checked = false;
    reasonSkinProblem.checked = false;
    noProblem.checked = false;
    if (stoma === "inskinlevel" || stoma === "retracted") {
        reasonNotRising.checked = true;
    }
    if (skin === "injured") {
        reasonSkinProblem.checked = true;
    }
    if (stomach === "wrinkled" || stomach === "deep") {
        reasonFolds.checked = true;
    }
    if (change === "yes") {
        reasonLeaking.checked = true;
    }
    if (stoma === "prominent" && skin === "intact" && stomach === "smooth" && tone === "tight" && change === "no") {
        noProblem.checked = true;
    }
}