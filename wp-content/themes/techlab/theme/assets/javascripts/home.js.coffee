jQuery ($) ->
  $(".equalHeight").each ->

    # should be responsive!!!! Modernizr!!!
    if Modernizr.mq("only screen and (min-width: 768px)")
      eHeight = $(this).innerHeight()
      $(this).children("div").css "min-height", eHeight
    return

  $(".tl-jumbo-right-faq").on "click", ->
    close = (elem) ->
      # there is no other way so we close ninja form success message here
      if ($('#ninja_forms_form_2_response_msg').hasClass('ninja-forms-success-msg'))
        $('#ninja_forms_form_2_response_msg').fadeOut(300)
      $(elem).slideUp 400, ->
        $(this).removeClass "faq-open"
        return

      return
    closeAll = ->
      $("body").find(".faq-open").each (index, elem) ->
        close elem
        return

      return
    open = ($elem) ->
      $elem.slideDown 400, ->
        $elem.addClass "faq-open"
        return

      return
    $this = $(this)
    return if $this.hasClass("tl-jumbo-right-faq-answer") or $this.hasClass("tl-jumbo-right-faq-ask-form")
    target = $this.data("target")
    $target = $("#" + target)
    if $target.hasClass("faq-open")
      closeAll()
    else
      closeAll()
      open $target
    return

  # Hide labels and display placeholder for ninja form fields
  $('#ninja_forms_field_8').attr('placeholder', $('#ninja_forms_field_8').val())
  $('#ninja_forms_field_8').val('')
  $('#ninja_forms_field_9').attr('placeholder', $('#ninja_forms_field_9').val())
  $('#ninja_forms_field_9').val('')
