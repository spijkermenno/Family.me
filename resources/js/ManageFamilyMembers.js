const familyMember = $('.familyMember');
const box = familyMember.find('.box');
const overlayManage = familyMember.find('.overlay-manage');
const overlayBrowse = familyMember.find('.overlay-browse');
const manage = $('#manageFamilyMembers');
const browse = $('#browseFamilyMembers');

manage.click(function () {

    box.addClass('wiggle');
    overlayManage.show();
    overlayBrowse.hide();
    manage.hide();
    browse.show();
});

browse.click(function () {
    box.removeClass('wiggle');
    overlayManage.hide();
    overlayBrowse.show();
    browse.hide();
    manage.show();
});
