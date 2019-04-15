var toggle = 0;
$('#manageFamilyMembers').click(function () {
    const box = $('.familyMember').find('.box');
    const overlay = $('.familyMember').find('.overlay');

    console.log(toggle);
    switch (toggle) {
        case 0:
            box.addClass('wiggle');
            overlay.show();

            toggle = 1;
            break;
        case 1:
            box.removeClass('wiggle');
            overlay.hide();
            toggle = 0;
            break;
    }
});