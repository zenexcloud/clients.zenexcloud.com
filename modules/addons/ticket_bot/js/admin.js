// Ticket BOT Admin JavaScript

// Protected branding data (obfuscated)
const _b = {
  n: atob("WmVuZXhDbG91ZCBMdGQu"),
  u: atob("aHR0cHM6Ly9zaGVyYXpkZXYuY29tLmJk"),
  l: atob(
    "aHR0cHM6Ly96ZW5leGNsb3VkLmNvbS9mcm9udGVuZC9pbWFnZXMvZGFyay5wbmc="
  ),
  p: "Powered by ZenexCloud Ltd.",
};

// Branding validation function
function _validateBranding() {
  return typeof _b === "object" && _b.n && _b.u && _b.l;
}

// Generate protected branding text
function _getBrandingText() {
  return _validateBranding() ? _b.n : "Ticket BOT";
}

// Generate protected logo URL
function _getLogoUrl() {
  return _validateBranding() ? _b.l : "";
}

// Generate protected loading text
function _getLoadingText() {
  return _validateBranding() ? _b.p : "Powered by ZenexCloud Ltd.";
}

jQuery(document).ready(function ($) {
  // Add CSS for notifications
  if (!$("#cyberin-notification-styles").length) {
    $("head").append(`
      <style id="cyberin-notification-styles">
        .cyberin-notification {
          position: fixed !important;
          top: 20px !important;
          right: 20px !important;
          z-index: 999999 !important;
          min-width: 350px !important;
          max-width: 500px !important;
          box-shadow: 0 8px 25px rgba(0,0,0,0.3) !important;
          border: none !important;
          border-radius: 8px !important;
          background: white !important;
          opacity: 1 !important;
          visibility: visible !important;
          display: block !important;
          pointer-events: auto !important;
        }
        .cyberin-notification.alert-success {
          background-color: #d4edda !important;
          border-color: #c3e6cb !important;
          color: #155724 !important;
        }
        .cyberin-notification.alert-danger {
          background-color: #f8d7da !important;
          border-color: #f5c6cb !important;
          color: #721c24 !important;
        }
        .cyberin-notification.alert-info {
          background-color: #d1ecf1 !important;
          border-color: #bee5eb !important;
          color: #0c5460 !important;
        }
      </style>
    `);
  }

  // --- Inject AI Button and UI Elements ---
  setTimeout(function () {
    var $injectionPoint = $("#tab0 .ticket-reply-submit-options .pull-left");

    if ($injectionPoint.length > 0 && $("#ai-assistant-btn").length === 0) {
      console.log("AI Addon: Injection point found. Adding buttons.");
      var aiButton =
        '<button type="button" class="btn btn-warning" id="ai-assistant-btn" style="margin-right: 10px;"><i class="fas fa-robot"></i> AI Reply</button>';
      var improveButton =
        '<button type="button" class="btn btn-info" id="improve-reply-btn" style="margin-right: 10px;"><i class="fas fa-magic"></i> Improve Reply</button>';
      $injectionPoint.append(aiButton).append(improveButton);

      var responseTypeDiv =
        '<div id="ai-response-type" style="display: none; margin-top: 15px; padding: 15px; background-color: #f8f9fa; border-top: 1px solid #dee2e6; clear: both;">' +
        '<label style="margin-right: 10px; font-weight: bold;">Response Style: </label>' +
        '<select id="ai-response-style" class="form-control" style="display: inline-block; width: auto; vertical-align: middle;">' +
        '<option value="general">General</option>' +
        '<option value="technical">Technical</option>' +
        '<option value="friendly">Friendly</option>' +
        '<option value="brief">Brief</option>' +
        '<option value="detailed">Detailed</option>' +
        "</select>" +
        '<button type="button" class="btn btn-success" id="ai-generate-btn" style="margin-left: 10px; vertical-align: middle;">Generate Response</button>' +
        '<button type="button" class="btn btn-default" id="ai-cancel-btn" style="margin-left: 5px; vertical-align: middle;">Cancel</button>' +
        "</div>";

      var improveReplyDiv =
        '<div id="improve-reply-options" style="display: none; margin-top: 15px; padding: 15px; background-color: #e3f2fd; border-top: 1px solid #2196f3; clear: both;">' +
        '<label style="margin-right: 10px; font-weight: bold;">Improvement Type: </label>' +
        '<select id="improve-reply-type" class="form-control" style="display: inline-block; width: auto; vertical-align: middle;">' +
        '<option value="rephrase">Rephrase for Clarity</option>' +
        '<option value="improveWriting">Improve Writing</option>' +
        '<option value="fixGrammar">Fix Grammar & Spelling</option>' +
        '<option value="enhance">Enhance & Expand</option>' +
        '<option value="polish">Polish & Refine</option>' +
        '<option value="professional">Make More Professional</option>' +
        '<option value="friendly">Make More Friendly</option>' +
        '<option value="concise">Make More Concise</option>' +
        '<option value="technical">Add Technical Details</option>' +
        "</select>" +
        '<button type="button" class="btn btn-success" id="improve-reply-generate-btn" style="margin-left: 10px; vertical-align: middle;">Improve Reply</button>' +
        '<button type="button" class="btn btn-default" id="improve-reply-cancel-btn" style="margin-left: 5px; vertical-align: middle;">Cancel</button>' +
        "</div>";

      var loadingDiv =
        '<div id="ai-loading" style="display: none; text-align: center; padding: 20px; background-color: #fff; border-top: 1px solid #dee2e6; clear: both;">' +
        '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>' +
        '<p style="margin-top: 10px;">Generating AI response...</p>' +
        '<small style="color: #6c757d;">' +
        _getLoadingText() +
        "</small>" +
        "</div>";

      var improveLoadingDiv =
        '<div id="improve-loading" style="display: none; text-align: center; padding: 20px; background-color: #fff; border-top: 1px solid #dee2e6; clear: both;">' +
        '<div class="spinner-border text-info" role="status"><span class="sr-only">Loading...</span></div>' +
        '<p style="margin-top: 10px;">Improving your reply...</p>' +
        '<small style="color: #6c757d;">' +
        _getLoadingText() +
        "</small>" +
        "</div>";

      $("#frmAddTicketReply")
        .append(responseTypeDiv)
        .append(improveReplyDiv)
        .append(loadingDiv)
        .append(improveLoadingDiv);
    } else {
      if ($injectionPoint.length === 0) {
        console.log(
          "AI Addon: Could not find the injection point for the AI Reply button."
        );
      } else {
        console.log("AI Addon: Buttons already exist.");
      }
    }
  }, 500);
  // -----------------------------------------

  // Get ticket ID from URL
  function getTicketId() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get("id");
  }

  // Show AI response modal using Bootstrap's modal component
  function showAIResponseModal(response, tokensUsed, cost) {
    // Ensure no old modals are lingering
    $("#aiResponseModal").remove();

    const modalHtml = `
      <div class="modal fade" id="aiResponseModal" tabindex="-1" role="dialog" aria-labelledby="aiResponseModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
              <h4 class="modal-title" id="aiResponseModalLabel">
                <i class="fas fa-robot"></i> AI Generated Response
              </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="ai-response-text" style="white-space: pre-wrap; background-color: #f9f9f9; border: 1px solid #ddd; padding: 15px; border-radius: 4px; max-height: 400px; overflow-y: auto;">${response}</div>
              <hr>
              <div class="ai-usage-stats row">
                <div class="col-md-6 text-center">
                  <strong>Tokens Used:</strong>
                  <p class="h4">${tokensUsed.toLocaleString()}</p>
                </div>
                <div class="col-md-6 text-center">
                  <strong>Estimated Cost:</strong>
                  <p class="h4">$${cost.toFixed(4)}</p>
                </div>
              </div>
              <div style="text-align: center; margin-top: 15px; padding: 10px; background-color: #f8f9fa; border-radius: 4px; font-size: 12px; color: #6c757d;">
                <strong>${_getBrandingText()}</strong>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="use-ai-response-btn">Use This Response</button>
            </div>
          </div>
        </div>
      </div>
    `;

    // Append modal to body and show it
    $("body").append(modalHtml);
    $("#aiResponseModal").modal("show");

    // Add a listener to remove the modal from the DOM when it's hidden
    $("#aiResponseModal").on("hidden.bs.modal", function () {
      $(this).remove();
    });
  }

  // Close AI response modal
  window.closeAIResponseModal = function () {
    $("#aiResponseModal").modal("hide");
  };

  // Use AI response in the message field (handler attached dynamically)
  $(document).on("click", "#use-ai-response-btn", function () {
    const responseText = $("#aiResponseModal .ai-response-text").text();
    $('textarea[name="message"]').val(responseText);
    closeAIResponseModal();

    // Show success message
    showNotification(
      "AI response has been copied to the message field.",
      "success"
    );
  });

  // Show notification
  function showNotification(message, type = "info") {
    const alertClass =
      type === "success"
        ? "alert-success"
        : type === "error"
        ? "alert-danger"
        : "alert-info";

    const iconClass =
      type === "success"
        ? "fas fa-check-circle"
        : type === "error"
        ? "fas fa-exclamation-triangle"
        : "fas fa-info-circle";

    const notification = `
            <div class="cyberin-notification alert ${alertClass} fade show" role="alert">
                <div style="display: flex; align-items: flex-start;">
                    <i class="${iconClass}" style="margin-right: 10px; margin-top: 2px; font-size: 16px;"></i>
                    <div style="flex: 1;">
                        <strong>${
                          type === "error"
                            ? "Action Required"
                            : type === "success"
                            ? "Success"
                            : "Information"
                        }</strong><br>
                        ${message}
                    </div>
                </div>
            </div>
        `;

    // Remove any existing notifications
    $(".cyberin-notification").remove();

    // Append notification to body
    $("body").append(notification);

    // Force show the notification
    setTimeout(function () {
      $(".cyberin-notification").css({
        opacity: "1",
        visibility: "visible",
        display: "block !important",
      });
    }, 100);

    // Auto-dismiss after 5 seconds for all notifications
    setTimeout(function () {
      $(".cyberin-notification").fadeOut(300, function () {
        $(this).remove();
      });
    }, 5000);
  }

  // Handle AI Reply button click
  $(document).on("click", "#ai-assistant-btn", function () {
    $("#ai-response-type").toggle();
    if ($("#ai-response-type").is(":visible")) {
      $(this)
        .text("Hide AI Reply")
        .removeClass("btn-info")
        .addClass("btn-secondary");
    } else {
      $(this)
        .html('<i class="fas fa-robot"></i> AI Reply')
        .removeClass("btn-secondary")
        .addClass("btn-info");
    }
  });

  // Handle Cancel button click
  $(document).on("click", "#ai-cancel-btn", function () {
    $("#ai-response-type").hide();
    $("#ai-assistant-btn")
      .html('<i class="fas fa-robot"></i> AI Reply')
      .removeClass("btn-secondary")
      .addClass("btn-info");
  });

  // Handle Generate Response button click
  $(document).on("click", "#ai-generate-btn", function () {
    console.log("OpenAI Addon: 'Generate Response' button clicked.");

    const ticketId = getTicketId();
    if (!ticketId) {
      showNotification(
        "Could not determine ticket ID. Please refresh the page.",
        "error"
      );
      console.log("OpenAI Addon: Error - Could not find ticketId.");
      return;
    }
    console.log("OpenAI Addon: Found ticketId:", ticketId);

    // Get the latest customer message from ticket history.
    let customerMessage = "";
    // Use a more robust set of selectors to find reply containers.
    const replies = $(".ticket-reply, .reply, .message");

    for (let i = replies.length - 1; i >= 0; i--) {
      const reply = $(replies[i]);
      // Check if the container or its parents indicate it is a staff/admin reply.
      if (
        !reply.hasClass("staff") &&
        !reply.hasClass("note") &&
        reply.closest(".staff, .note").length === 0
      ) {
        // Find the message text within the container.
        let messageText = reply.find(".messagetext, .msgwrap, p").text().trim();
        if (!messageText) {
          // Fallback for simpler structures.
          messageText = reply.text().trim();
        }
        if (messageText) {
          customerMessage = messageText;
          break;
        }
      }
    }

    if (!customerMessage) {
      showNotification(
        "Could not find customer message. Please ensure there is a customer message in the ticket.",
        "error"
      );
      console.log("OpenAI Addon: Error - Could not find customer message.");
      return;
    }
    console.log("OpenAI Addon: Found customerMessage:", customerMessage);

    const responseType = $("#ai-response-style").val();
    const ticketSubject =
      $(".ticket-subject").text().trim() || "Support Ticket";
    console.log(
      "OpenAI Addon: Using responseType '" +
        responseType +
        "' and subject '" +
        ticketSubject +
        "'"
    );

    // Show loading indicator
    $("#ai-loading").show();
    $("#ai-generate-btn").prop("disabled", true).text("Generating...");

    // Prepare request data
    const requestData = {
      ticket_id: ticketId,
      customer_message: customerMessage,
      ticket_subject: ticketSubject,
      response_type: responseType,
    };

    console.log("OpenAI Addon: Making API call with data:", requestData);

    // Make API call
    $.ajax({
      url: "../modules/addons/ticket_bot/generate_response.php",
      method: "POST",
      contentType: "application/json",
      data: JSON.stringify(requestData),
      timeout: 60000, // 60 seconds timeout
      success: function (response) {
        $("#ai-loading").hide();
        $("#ai-generate-btn").prop("disabled", false).text("Generate Response");

        if (response.success) {
          showAIResponseModal(
            response.response,
            response.tokens_used || 0,
            response.cost || 0
          );
        } else {
          showNotification(
            "Error: " + (response.error || "Unknown error occurred"),
            "error"
          );
        }
      },
      error: function (xhr, status, error) {
        $("#ai-loading").hide();
        $("#ai-generate-btn").prop("disabled", false).text("Generate Response");

        let errorMessage = "Failed to generate AI response.";
        if (xhr.responseJSON && xhr.responseJSON.error) {
          errorMessage = xhr.responseJSON.error;
        } else if (status === "timeout") {
          errorMessage = "Request timed out. Please try again.";
        } else if (xhr.status === 401) {
          errorMessage =
            "Unauthorized. Please check your OpenAI API key configuration.";
        } else if (xhr.status === 400) {
          errorMessage =
            "Invalid request. Please check the ticket information.";
        }

        showNotification(errorMessage, "error");
      },
    });
  });

  // Handle keyboard shortcuts
  $(document).keydown(function (e) {
    // Ctrl+Shift+A to toggle AI Reply
    if (e.ctrlKey && e.shiftKey && e.keyCode === 65) {
      e.preventDefault();
      $("#ai-assistant-btn").click();
    }

    // Escape to close AI response modal
    if (e.keyCode === 27) {
      closeAIResponseModal();
    }
  });

  // Add keyboard shortcut hint
  setTimeout(function () {
    if ($("#ai-assistant-btn").length > 0) {
      $("#ai-assistant-btn").attr("title", "AI Reply (Ctrl+Shift+A)");
    }
  }, 2000);

  // Auto-hide response type selector when clicking outside
  $(document).click(function (e) {
    if (!$(e.target).closest("#ai-response-type, #ai-assistant-btn").length) {
      $("#ai-response-type").hide();
      $("#ai-assistant-btn")
        .html('<i class="fas fa-robot"></i> AI Reply')
        .removeClass("btn-secondary")
        .addClass("btn-info");
    }

    if (
      !$(e.target).closest("#improve-reply-options, #improve-reply-btn").length
    ) {
      $("#improve-reply-options").hide();
      $("#improve-reply-btn")
        .html('<i class="fas fa-magic"></i> Improve Reply')
        .removeClass("btn-secondary")
        .addClass("btn-info");
    }
  });

  // Handle modal backdrop click
  $(document).on("click", ".ai-response-modal", function (e) {
    if (e.target === this) {
      closeAIResponseModal();
    }
  });

  // Add help tooltip for response types
  const responseTypeHelp = {
    general: "Balanced response suitable for most situations",
    rephrase: "Rephrase the reply for clarity and readability",
    fixGrammar: "Fix the grammar and spelling of provided content",
    improveWriting:
      "Improve the writing style and tone of the provided content",
    technical: "Detailed technical explanation with step-by-step instructions",
    friendly: "Warm and empathetic response",
    brief: "Concise and to-the-point response",
    detailed: "Comprehensive response with thorough explanations",
  };

  $("#ai-response-style").change(function () {
    const selectedType = $(this).val();
    const helpText = responseTypeHelp[selectedType] || "";

    // Remove existing help text
    $(".ai-response-help").remove();

    if (helpText) {
      const helpElement = `<div class="ai-response-help" style="font-size: 12px; color: #6c757d; margin-top: 5px;">${helpText}</div>`;
      $(this).after(helpElement);
    }
  });

  // Trigger change event to show initial help text
  $("#ai-response-style").trigger("change");

  // Handle Improve Reply button click
  $(document).on("click", "#improve-reply-btn", function () {
    // Check if there's text in the message field
    const currentMessage = $('textarea[name="message"]').val().trim();
    if (!currentMessage) {
      showNotification(
        "Please write your reply in the message field first, then click 'Improve Reply' to enhance it with AI assistance.",
        "error"
      );
      // Focus on the message textarea to guide the user
      $('textarea[name="message"]').focus();
      return;
    }

    $("#improve-reply-options").toggle();
    if ($("#improve-reply-options").is(":visible")) {
      $(this)
        .text("Hide Improve Options")
        .removeClass("btn-info")
        .addClass("btn-secondary");
    } else {
      $(this)
        .html('<i class="fas fa-magic"></i> Improve Reply')
        .removeClass("btn-secondary")
        .addClass("btn-info");
    }
  });

  // Handle Improve Reply Cancel button click
  $(document).on("click", "#improve-reply-cancel-btn", function () {
    $("#improve-reply-options").hide();
    $("#improve-reply-btn")
      .html('<i class="fas fa-magic"></i> Improve Reply')
      .removeClass("btn-secondary")
      .addClass("btn-info");
  });

  // Handle Improve Reply Generate button click
  $(document).on("click", "#improve-reply-generate-btn", function () {
    console.log("OpenAI Addon: 'Improve Reply' button clicked.");

    const ticketId = getTicketId();
    if (!ticketId) {
      showNotification(
        "Could not determine ticket ID. Please refresh the page.",
        "error"
      );
      console.log("OpenAI Addon: Error - Could not find ticketId.");
      return;
    }

    const currentMessage = $('textarea[name="message"]').val().trim();
    if (!currentMessage) {
      showNotification(
        "Please write your reply in the message field first, then click 'Improve Reply' to enhance it with AI assistance.",
        "error"
      );
      // Focus on the message textarea to guide the user
      $('textarea[name="message"]').focus();
      return;
    }

    // Get the latest customer message from ticket history for context
    let customerMessage = "";
    const replies = $(".ticket-reply, .reply, .message");

    for (let i = replies.length - 1; i >= 0; i--) {
      const reply = $(replies[i]);
      if (
        !reply.hasClass("staff") &&
        !reply.hasClass("note") &&
        reply.closest(".staff, .note").length === 0
      ) {
        let messageText = reply.find(".messagetext, .msgwrap, p").text().trim();
        if (!messageText) {
          messageText = reply.text().trim();
        }
        if (messageText) {
          customerMessage = messageText;
          break;
        }
      }
    }

    const improvementType = $("#improve-reply-type").val();
    const ticketSubject =
      $(".ticket-subject").text().trim() || "Support Ticket";

    console.log("OpenAI Addon: Improving reply with type:", improvementType);

    // Show loading indicator
    $("#improve-loading").show();
    $("#improve-reply-generate-btn")
      .prop("disabled", true)
      .text("Improving...");

    // Prepare request data
    const requestData = {
      ticket_id: ticketId,
      current_reply: currentMessage,
      customer_message: customerMessage,
      ticket_subject: ticketSubject,
      improvement_type: improvementType,
      action: "improve_reply",
    };

    console.log(
      "OpenAI Addon: Making improve reply API call with data:",
      requestData
    );

    // Make API call
    $.ajax({
      url: "../modules/addons/ticket_bot/generate_response.php",
      method: "POST",
      contentType: "application/json",
      data: JSON.stringify(requestData),
      timeout: 60000, // 60 seconds timeout
      success: function (response) {
        $("#improve-loading").hide();
        $("#improve-reply-generate-btn")
          .prop("disabled", false)
          .text("Improve Reply");

        if (response.success) {
          showImprovedReplyModal(
            response.response,
            response.tokens_used || 0,
            response.cost || 0,
            currentMessage
          );
        } else {
          showNotification(
            "Error: " + (response.error || "Unknown error occurred"),
            "error"
          );
        }
      },
      error: function (xhr, status, error) {
        $("#improve-loading").hide();
        $("#improve-reply-generate-btn")
          .prop("disabled", false)
          .text("Improve Reply");

        let errorMessage = "Failed to improve reply.";
        if (xhr.responseJSON && xhr.responseJSON.error) {
          errorMessage = xhr.responseJSON.error;
        } else if (status === "timeout") {
          errorMessage = "Request timed out. Please try again.";
        } else if (xhr.status === 401) {
          errorMessage =
            "Unauthorized. Please check your OpenAI API key configuration.";
        } else if (xhr.status === 400) {
          errorMessage = "Invalid request. Please check the reply content.";
        }

        showNotification(errorMessage, "error");
      },
    });
  });

  // Show improved reply modal
  function showImprovedReplyModal(
    improvedReply,
    tokensUsed,
    cost,
    originalReply
  ) {
    // Ensure no old modals are lingering
    $("#improvedReplyModal").remove();

    const modalHtml = `
      <div class="modal fade" id="improvedReplyModal" tabindex="-1" role="dialog" aria-labelledby="improvedReplyModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
              <h4 class="modal-title" id="improvedReplyModalLabel">
                <i class="fas fa-magic"></i> Improved Reply
              </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <h5><i class="fas fa-edit"></i> Original Reply</h5>
                  <div class="original-reply-text" style="white-space: pre-wrap; background-color: #f5f5f5; border: 1px solid #ddd; padding: 10px; border-radius: 4px; max-height: 300px; overflow-y: auto; font-size: 13px;">${originalReply}</div>
                </div>
                <div class="col-md-6">
                  <h5><i class="fas fa-magic"></i> Improved Reply</h5>
                  <div class="improved-reply-text" style="white-space: pre-wrap; background-color: #e8f5e8; border: 1px solid #4caf50; padding: 10px; border-radius: 4px; max-height: 300px; overflow-y: auto; font-size: 13px;">${improvedReply}</div>
                </div>
              </div>
              <hr>
              <div class="ai-usage-stats row">
                <div class="col-md-6 text-center">
                  <strong>Tokens Used:</strong>
                  <p class="h4">${tokensUsed.toLocaleString()}</p>
                </div>
                <div class="col-md-6 text-center">
                  <strong>Estimated Cost:</strong>
                  <p class="h4">$${cost.toFixed(4)}</p>
                </div>
              </div>
              <div style="text-align: center; margin-top: 15px; padding: 10px; background-color: #f8f9fa; border-radius: 4px; font-size: 12px; color: #6c757d;">
                <strong>${_getBrandingText()}</strong>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="use-improved-reply-btn">Use Improved Reply</button>
            </div>
          </div>
        </div>
      </div>
    `;

    // Append modal to body and show it
    $("body").append(modalHtml);
    $("#improvedReplyModal").modal("show");

    // Add a listener to remove the modal from the DOM when it's hidden
    $("#improvedReplyModal").on("hidden.bs.modal", function () {
      $(this).remove();
    });
  }

  // Use improved reply in the message field
  $(document).on("click", "#use-improved-reply-btn", function () {
    const improvedReplyText = $(
      "#improvedReplyModal .improved-reply-text"
    ).text();
    $('textarea[name="message"]').val(improvedReplyText);
    $("#improvedReplyModal").modal("hide");

    // Show success message
    showNotification(
      "Improved reply has been copied to the message field.",
      "success"
    );
  });
});
