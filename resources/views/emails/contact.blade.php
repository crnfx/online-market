<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Новая заявка</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f8fafc; font-family: 'Inter', 'Roboto', Arial, sans-serif;">
<div style="max-width: 600px; margin: 0 auto; padding: 40px 20px;">

  <div
    style="background: linear-gradient(135deg, #0EA5E9 0%, #0284C7 100%); padding: 30px; border-radius: 16px 16px 0 0; text-align: center;">
    <h1 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 700;">
      Новая заявка с сайта
    </h1>
  </div>

  <div
    style="background: #ffffff; padding: 30px; border-radius: 0 0 16px 16px; box-shadow: 0 2px 8px rgba(14, 165, 233, 0.06);">

    <p style="margin: 0 0 20px 0; color: #64748B; font-size: 14px;">
      Поступила новая заявка с формы обратной связи:
    </p>

    <table style="width: 100%; border-collapse: collapse;">
      <tr>
        <td style="padding: 12px 0; border-bottom: 1px solid #E2E8F0;">
          <strong style="color: #0F172A; font-size: 14px;">Имя:</strong>
        </td>
        <td style="padding: 12px 0; border-bottom: 1px solid #E2E8F0; color: #334155; font-size: 14px;">
          {{ $data['name'] }}
        </td>
      </tr>

      @if(!empty($data['phone']))
        <tr>
          <td style="padding: 12px 0; border-bottom: 1px solid #E2E8F0;">
            <strong style="color: #0F172A; font-size: 14px;">Телефон:</strong>
          </td>
          <td style="padding: 12px 0; border-bottom: 1px solid #E2E8F0; color: #334155; font-size: 14px;">
            <a href="tel:{{ $data['phone'] }}" style="color: #0EA5E9; text-decoration: none;">
              {{ $data['phone'] }}
            </a>
          </td>
        </tr>
      @endif

      <tr>
        <td style="padding: 12px 0; border-bottom: 1px solid #E2E8F0;">
          <strong style="color: #0F172A; font-size: 14px;">Email:</strong>
        </td>
        <td style="padding: 12px 0; border-bottom: 1px solid #E2E8F0; color: #334155; font-size: 14px;">
          <a href="mailto:{{ $data['email'] }}" style="color: #0EA5E9; text-decoration: none;">
            {{ $data['email'] }}
          </a>
        </td>
      </tr>

      @if(!empty($data['comment']))
        <tr>
          <td style="padding: 12px 0; vertical-align: top;">
            <strong style="color: #0F172A; font-size: 14px;">Сообщение:</strong>
          </td>
          <td style="padding: 12px 0; color: #334155; font-size: 14px; line-height: 1.6;">
            {{ $data['comment'] }}
          </td>
        </tr>
      @endif
    </table>

    <p style="margin: 24px 0 0 0; color: #94A3B8; font-size: 12px;">
      Дата отправки: {{ now()->format('d.m.Y H:i') }}
    </p>
  </div>

  <div style="text-align: center; padding: 20px 0;">
    <p style="margin: 0; color: #94A3B8; font-size: 12px;">
      © {{ date('Y') }} Online Market. Все права защищены.
    </p>
  </div>
</div>
</body>
</html>
