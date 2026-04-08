
private String getFileSHA256(Uri uri) throws Exception {
    MessageDigest md = MessageDigest.getInstance("SHA-256");
    InputStream is = getContentResolver().openInputStream(uri);
    byte[] buffer = new byte[8192];
    int read;
    while ((read = is.read(buffer)) > 0) {
        md.update(buffer, 0, read);
    }
    byte[] hashBytes = md.digest();
    

    StringBuilder sb = new StringBuilder();
    for (byte b : hashBytes) {
        sb.append(String.format("%02x", b));
    }
    return sb.toString();
}
